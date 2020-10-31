<?php
use \Phalcon\Mvc\Micro\Collection;
use App\Controllers\HelloController;
use App\Controllers\UserController;

$hello = new Collection();
$hello
    ->setHandler(new HelloController())
    ->setPrefix('/hello')
    ->get('/', 'index')
    ->get('/{word}', 'print');

$application->mount($hello);


$user = new Collection();
$user
    ->setHandler(new UserController())
    ->setPrefix('/users')
    ->get('/', 'index')
    ->get('/{uuid}', 'view');

$application->mount($user);
