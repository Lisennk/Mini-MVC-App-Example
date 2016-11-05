<?php

namespace App\Services;

use App\Repositories\UserRepository;

/**
 * Auth provider
 *
 * @package App\Services
 */
class Auth
{
    /**
     * @var UserRepository
     */
    static protected $users;

    /**
     * Returns true if current user is logged in, false if not
     *
     * @return bool
     */
    static function check()
    {
        if (empty(self::$users)) self::$users = new UserRepository;

        if (empty($_REQUEST['email']) || empty($_REQUEST['password'])) return false;

        if (self::$users->exists($_REQUEST['email'], $_REQUEST['password'])) {
            setcookie('email', $_REQUEST['email'], time() + 3600 * 12 * 30);
            setcookie('password', $_REQUEST['password'], time() + 3600 * 12 * 30);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Returns current user data
     *
     * @return bool|\stdClass
     */
    static function user()
    {
        if (self::check()) {
            return self::$users->getByData($_COOKIE['email'], $_COOKIE['password']);
        } else {
            return false;
        }
    }
}