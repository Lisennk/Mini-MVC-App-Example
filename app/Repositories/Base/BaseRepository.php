<?php

namespace App\Repositories\Base;

use Foundation\Database;

/**
 * Class BaseRepository
 * @package App\Repositories\Base
 */
abstract class BaseRepository
{
    /**
     * @var Database
     */
    protected $db;

    /**
     * Set up database
     */
    public function __construct()
    {
        $config = include(dirname(__FILE__, 3) . '/config/db.php');
        $this->db = new Database($config);
    }
}