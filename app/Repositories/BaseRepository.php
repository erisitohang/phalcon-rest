<?php


namespace App\Repositories;


use Phalcon\Di;

class BaseRepository
{
    /**
     * @var Di\DiInterface
     */
    protected $modelsManager;

    public function __construct()
    {
        $this->modelsManager = Di::getDefault()->get('modelsManager');
    }
}
