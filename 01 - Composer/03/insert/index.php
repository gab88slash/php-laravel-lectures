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

$writer = Writer::createFromFileObject(new SplFileObject('file.csv','a+'));

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();


if(
    $request->request->has('giorno') && $request->request->get('giorno') != "" &&
    $request->request->has('gara') && $request->request->get('gara') != "")
{
    if(!$request->request->has('finale')) $finale = 0;
    else $finale = 1;
    $writer->insertOne([$request->request->get('giorno'), $request->request->get('gara'), $finale]);
}

$reader = Reader::createFromFileObject(new SplFileObject('file.csv'));
$results = iterator_to_array($reader->fetchAssoc(0),false);

use Symfony\Component\HttpFoundation\JsonResponse as Response;

use Illuminate\Support\Collection;

$collezione = new Collection($results);

$collezione = $collezione->keyBy('giorno');

$collezione->sortBy(function ($item,$key) {
    $data = \Carbon\Carbon::createFromFormat('d/m/y',$key);

    return $data->timestamp;
});

$response = new Response($collezione);
$response->send();
