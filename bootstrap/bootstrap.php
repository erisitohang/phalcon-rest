<?php
require_once __DIR__.'/../vendor/autoload.php';

use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\Collection as MicroCollection;
use App\Controllers\HelloController;

$application = new Micro();

$di = require_once __DIR__ . '/di.php';

$micro = new Micro($di);

$manager = require_once __DIR__ . '/manager.php';


$application->setEventsManager($manager);


$invoices = new MicroCollection();
$invoices
    ->setHandler(new HelloController())
    ->setPrefix('/hello')
    ->get('/', 'index')
    ->get('/{word}', 'print');

$application->mount($invoices);



$application->handle(
    $_SERVER["REQUEST_URI"]
);
