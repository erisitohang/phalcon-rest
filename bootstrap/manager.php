<?php

use Phalcon\Events\Manager;
use App\Middlewares\NotFoundMiddleware;
use App\Middlewares\ResponseMiddleware;

$application = $application;

/**
 * Create a new Events Manager.
 */
$manager = new Manager();


// before
//$manager->attach(
//    'micro',
//    new CacheMiddleware()
//);
//
//$application->before(
//    new CacheMiddleware()
//);


//before
$manager->attach(
    'micro',
    new NotFoundMiddleware()
);
//
$application->before(
    new NotFoundMiddleware()
);
//
//// after
///
$manager->attach(
    'micro',
    new ResponseMiddleware()
);

$application->after(
    new ResponseMiddleware()
);

return $manager;
