<?php
use Phalcon\Di;
require_once dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Load the config
 *
 */
$config = require_once __DIR__ . '/setup.php';


/**
 * Class loader
 *
 */
require_once __DIR__ . '/loader.php';



return new Di();
