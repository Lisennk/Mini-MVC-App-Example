<?php

namespace App\Repositories;

use App\Repositories\Base\BaseRepository;
use Foundation\Database;

/**
 * Class UserRepository
 */
class UserRepository extends BaseRepository
{
    /**
     * @var string DB table name
     */
    protected $table = 'users';

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
    public function exists($email, $password)
    {
        if ($this->getByData($email, $password)) return true;
        return false;
    }

    /**
     * Returns user data by its email
     *
     * @param $email
     * @param $password
     * @return bool|\stdClass
     */
    public function getByData($email, $password)
    {
        $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE `email` = :email AND `password` = :password");
        $result = $statement->execute([':email' => $email, ':password' => password_hash($password, PASSWORD_DEFAULT)]);
        return $result ? $statement->fetchObject() : null;
    }
}