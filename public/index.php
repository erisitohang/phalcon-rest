<?php
$application = require_once dirname(__DIR__) . '/bootstrap/bootstrap.php';

$application->handle(
    $_SERVER["REQUEST_URI"]
);
