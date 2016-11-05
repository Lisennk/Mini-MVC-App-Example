<?php

namespace App\Controllers;

use App\Controllers\Base\BaseController;

/**
 * Class ExitController
 * @package App\Controllers
 */
class ExitController extends BaseController
{
    /**
     * Log out current user
     */
    public function fire()
    {
        unset($_COOKIE['id']);
        unset($_COOKIE['password']);
        setcookie('id', null, -1, '/');
        setcookie('password', null, -1, '/');
        header('Location: /');
    }
}