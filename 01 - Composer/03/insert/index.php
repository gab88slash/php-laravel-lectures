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


if (!ini_get("auto_detect_line_endings")) {
    ini_set("auto_detect_line_endings", '1');
}
use League\Csv\Writer;
use League\Csv\Reader;
/*
 * Creo un Writer Csv in scrittura in modalità append (non cancello le cose vecchie)
 */
$writer = Writer::createFromFileObject(new SplFileObject('file.csv','a+'));

use Symfony\Component\HttpFoundation\Request;

/*
 * Creo una richiesta dalle globali
 */
$request = Request::createFromGlobals();

/*
 * controllo che esistano i dati
 */
if(
    $request->request->has('giorno') && $request->request->get('giorno') != "" &&
    $request->request->has('gara') && $request->request->get('gara') != "")
{
    /*
     * la checkbox se è falsa non viene inviata
     *
     * ci sono soluzioni migliori?
     */
    if(!$request->request->has('finale')) $finale = 0;
    else $finale = 1;

    /*
     * inserisco una nuova riga csv
     */
    $writer->insertOne([$request->request->get('giorno'), $request->request->get('gara'), $finale]);
}

/*
 * il ritorno sono tutte le righe del csv ordinate per giorno
 *
 * Vedere esercizio 03
 */
$reader = Reader::createFromFileObject(new SplFileObject('file.csv'));
$results = iterator_to_array($reader->fetchAssoc(0),false);

use Symfony\Component\HttpFoundation\JsonResponse as Response;

use Illuminate\Support\Collection;

$collezione = new Collection($results);

$collezione->sortBy(function ($item,$key) {
    $data = \Carbon\Carbon::createFromFormat('d/m/y',$item['giorno']);

    return $data->timestamp;
});

$response = new Response($collezione);
$response->send();
