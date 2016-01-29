<?php

/**
 * Soluzione all'esercizio sui csv con composer
 *
 */

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('name'); // in alternativa senza la dicitura 'use' avremmo dovuto scrivere new Monolog\Logger('name');

$log->pushHandler(new StreamHandler('app.log', Logger::DEBUG)); //a differenza di ieri creo un Log su cui vengono scritti i messaggi di debug

/*
 * a questo punto secondo la documentazione possiamo inserire nel log quello che vogliamo
 */
$log->debug('Stiamo avviando il file '. __DIR__ . __FILE__);

/*
 * Setto questi parametri perchè potrebbero esserci dei problemi usando file da MAC
 */
if (!ini_get("auto_detect_line_endings")) {
    ini_set("auto_detect_line_endings", '1');
}
/*
 * Seleziono la Classe Reader a cui sono interessato
 */
use League\Csv\Reader;

/*
 * Seguendo la documentazione creo un Reader partendo da un file che ho creato
 *
 * dopodichè usando fetchAssoc faccio in modo di associare i nomi della colonna con i valori.
 *
 * il parametro 0 serve per passare il punto della tabella in cui ci sono i valori delle chiavi.
 *
 */
$reader = Reader::createFromFileObject(new SplFileObject('file.csv'));

/*
 * trasforma l'iteratore ritornato da reader->fetchAssoc(0) in un array
 */
$results = iterator_to_array($reader->fetchAssoc(0),false);


use Symfony\Component\HttpFoundation\JsonResponse as Response;
/*
 * composer install illuminate/support
 */
use Illuminate\Support\Collection;


/*
 * crea una collezione ovvero un Array potenziato su cui possiamo eseguire dei metodi più fighi
 */
$collezione = new Collection($results);

/*
 * gli elementi senza chiave ora prendono una chiave basandosi su un valore dell'array associativo. Scelgo giorno.
 * Il keyBy si occupa di scegliere se ci sono più elementi con lo stesso valore di giorno di sceglierne uno
 */
$collezione = $collezione->keyBy('giorno');


/*
 * Ordino gli elementi per chiave
 */
$collezione->sortBy(function ($item,$key) {
    /*
     * essendo una data l'ordinamento per stringa non funziona bene. Uso una libreria esterna per gestire le date.
     */
    $data = \Carbon\Carbon::createFromFormat('d/m/y',$key);

    /*
     * ritorno il timestamp che così ci permette di ordinare in modo corretto
     */
    return $data->timestamp;
});

/*
 * ritorno la risposta
 */
$response = new Response($collezione);
$response->send();
