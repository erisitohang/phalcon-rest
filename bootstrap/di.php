<?php
use Phalcon\Di;
use Phalcon\Db\Adapter\Pdo\MySQL;

/**
 * Create a new Factory default dependancy injector
 *
 */
$container = new Di\FactoryDefault();
DI::reset();

$container = new Di();

$config = require_once __DIR__ . '/../configs/config.php';

$container->set('config', $config);

$container->set(
    'db',
    function ($config) {
        return new MySQL($config->db);
    }
);

DI::setDefault($container);

return $container;
