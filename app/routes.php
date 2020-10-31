<?php
use \Phalcon\Mvc\Micro\Collection;
use App\Controllers\HelloController;

$hello = new Collection();
$hello
    ->setHandler(new HelloController())
    ->setPrefix('/hello')
    ->get('/', 'index')
    ->get('/{word}', 'print');

$application->mount($hello);
