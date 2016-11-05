<?php

namespace App\Services;

use App\Repositories\UserRepository;

/**
 * Class Auth
 *
 * @package App\Services
 */
class Auth
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var \stdClass Current user
     */
    protected $user;

    /**
     * Auth constructor.
     */
    public function __construct()
    {
        $this->repository = new UserRepository;
    }

    /**
     * True if email and password are correct
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public function verify($email, $password)
    {
        return $this->repository->emailAndPassExists($email, $password);
    }

    /**
     * True if current user is logged in
     *
     * @return bool
     */
    public function isLoggedIn()
    {
        if (empty($_COOKIE['id']) || empty($_COOKIE['password'])) return false;
        return $this->repository->idAndHashedPassExists($_COOKIE['id'], $_COOKIE['password']);
    }

    /**
     * Returns current logged in user data
     *
     * @return mixed|\stdClass
     */
    public function getLoggedUser()
    {
        if (empty($this->user) && $this->isLoggedIn()) {
            $this->user = $this->repository->getById($_COOKIE['id']);
        }

        return $this->user;
    }

    /**
     * Log in current user
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public function logIn($email, $password)
    {
        if ($this->verify($email, $password)) {
            $this->user = $this->repository->getByEmail($email);
            $this->createSession();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Create cookies
     */
    protected function createSession()
    {
        setcookie('id', $this->user->id, time() + 3600 * 12 * 30);
        setcookie('password', $this->user->password, time() + 3600 * 12 * 30);
    }
}