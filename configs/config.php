<?php
use Phalcon\Config;
use \Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv(true);
$dotenv->load(__DIR__ . '/../.env');

$app = require_once __DIR__ . '/app.php';
$db = require_once __DIR__ . '/db.php';

return new Config(
    [
        'app' => $app,
        'db' => $db
    ]
);
