<?php
use Phalcon\Di;
use Phalcon\Db\Adapter\Pdo\MySQL;
use Phalcon\Mvc\Model\Manager;
use Phalcon\Mvc\Model\Metadata\Memory;


/**
 * !TODO https://docs.phalcon.io/4.0/en/di
 * Create a new Factory default dependancy injector
 *
 */
$container = new Di\FactoryDefault();
DI::reset();

$config = require_once __DIR__ . '/../configs/config.php';

$container->set('config', $config);

$container->set(
    'db',
    new MySQL($config->db->toArray())
);

$container->set(
    'modelsManager',
    new Manager()
);


$container->set(
    'modelsMetadata',
    new Memory()
);



$container->setShared('userRepository', '\App\Repositories\UserRepository');



DI::setDefault($container);

return $container;
