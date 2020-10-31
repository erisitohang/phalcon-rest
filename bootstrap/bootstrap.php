<?php
require_once __DIR__.'/../vendor/autoload.php';

use Phalcon\Mvc\Micro;


$application = new Micro();

$di = require_once __DIR__ . '/di.php';

$micro = new Micro($di);

$manager = require_once __DIR__ . '/manager.php';


$application->setEventsManager($manager);


require_once __DIR__ . '/../app/routes.php';


return $application;
