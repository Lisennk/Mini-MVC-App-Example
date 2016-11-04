<?php

namespace App\Repositories;

use Foundation\Database;

/**
 * Class UserRepository
 */
class UserRepository
{
    /**
     * @var string DB table name
     */
    protected $table = 'users';

    /**
     * @var Database
     */
    protected $db;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $config = include(dirname(__FILE__, 3) . '/config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Creates a new user
     *
     * @param $name
     * @param $email
     * @param $password
     * @return mixed
     */
    public function add($name, $email, $password)
    {
        $query = "INSERT INTO {$this->table} (name, email, password) VALUES (:name, :email, :password);";

        $this->db->prepare($query)->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        return $this->db->lastInsertId();
    }

    /**
     * True if user exists
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public function has($email, $password)
    {
        $query = "SELECT `email` FROM {$this->table} WHERE `email` = :email AND `password` = :password LIMIT 1";

        $result = $this->db->prepare($query)->execute([
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT)
        ])->fetch();

        if ($result) return true;
        return false;
    }
}