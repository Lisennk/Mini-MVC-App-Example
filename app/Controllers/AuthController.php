<?php

namespace App\Controllers;

use App\Controllers\Base\BaseController;
use App\Services\Auth;

/**
 * Class AuthController
 *
 * @package App\Controllers
 */
class AuthController extends BaseController
{
    /**
     * @var Auth
     */
    protected $auth;

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->auth = new Auth();
    }

    /**
     * Performs user authorization
     *
     * @return mixed|string
     */
    public function fire()
    {

        if (empty($_POST['email']) || empty($_POST['password'])) {
            return $this->view('index', ['message' => 'You must fill all fields!']);
        }

        if ($this->auth->logIn($_POST['email'], $_POST['password'])) {
            header('Location: /');
            return true;
        } else {
            return $this->view('index', ['message' => 'Incorrect data! Try again.']);
        }
    }
}