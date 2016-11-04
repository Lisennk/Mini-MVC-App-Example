<?php

namespace Foundation;

use PDO;

/**
 * Database Facade
 *
 * @package Foundation
 */
class Database
{
    /**
     * @var PDO
     */
    private $driver;

    /**
     * Database constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->driver = new PDO($config['server'], $config['user'], $config['password']);
    }

    /**
     * Use magic for the first time
     *
     * @param $method
     * @param $arguments
     */
    public function __call($method, $arguments)
    {
        $this->driver->$method(...$arguments);
    }
}