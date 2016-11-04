<?php

namespace Foundation;

use PDO;

/**
 * Facade Database
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
     * Prepare PDO statement
     *
     * @param $query
     * @return \PDOStatement
     */
    public function prepare($query)
    {
        return $this->driver->prepare($query);
    }
}