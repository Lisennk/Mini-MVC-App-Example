<?php

namespace App\Controllers;

use App\Controllers\Base\BaseController;
use App\Services\Auth;

/**
 * Class HomeController
 *
 * @package App\Controllers
 */
class HomeController extends BaseController
{
    /**
     * @var Auth
     */
    protected $auth;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->auth = new Auth();
    }

    /**
     * Display sign up/sign in form or user profile
     *
     * @return mixed
     */
    public function fire()
    {
        if ($this->auth->isLoggedIn()) {
            return $this->view('index', ['user' => $this->auth->getLoggedUser()]);
        } else {
            return $this->view('index');
        }
    }
}