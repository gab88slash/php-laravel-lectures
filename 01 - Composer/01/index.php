<?php
/**
 * Created by PhpStorm.
 * User: gab88slash
 * Date: 21/01/16
 * Time: 09:50
 */

require __DIR__ . '/vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
$log->addWarning('Foo');

$log->warning('Questo è un warning');