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
     * True if user with email and password exists
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public function emailAndPassExists($email, $password)
    {
        $statement = $this->db->prepare("SELECT `password` FROM {$this->table} WHERE `email` = :email LIMIT 1");
        $statement->execute([':email' => $email]);
        $user = $statement->fetchObject();
        if (!$user) return false;
        return password_verify($password, $user->password);
    }

    /**
     * True if user with id and hashed password exists
     *
     * @param $id
     * @param $hash
     * @return bool
     */
    public function idAndHashedPassExists($id, $hash)
    {
        $statement = $this->db->prepare("SELECT `password` FROM {$this->table} WHERE `id` = :id AND `password` = :hash");
        $statement->execute([':id' => $id, ':hash' => $hash]);
        $user = $statement->fetchObject();

        return ($user != false);
    }

    /**
     * Returns user by it's ID
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE `id` = :id");
        $statement->execute([':id' => $id]);
        return $statement->fetchObject();
    }

    /**
     * Returns user by it's email
     *
     * @param $email
     * @return mixed
     */
    public function getByEmail($email)
    {
        $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE `email` = :email");
        $statement->execute([':email' => $email]);
        return $statement->fetchObject();
    }
}