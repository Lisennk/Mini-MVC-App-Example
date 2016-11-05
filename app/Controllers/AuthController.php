<?php

namespace App\Controllers;

use App\Controllers\Base\BaseController;
use App\Repositories\UserRepository;
use App\Services\Auth;

/**
 * Class AuthController
 *
 * @package App\Controllers
 */
class AuthController extends BaseController
{
    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->users = new UserRepository;
    }

    /**
     * Performs user authorization
     *
     * @return mixed|string
     */
    public function fire()
    {

        if (empty($_POST['email']) || empty($_POST['password']))
            return $this->view('index', ['message' => 'You must fill all fields!']);

        if (Auth::check()) {
            header('Location: /');
            return true;
        }

        return $this->view('index', ['message' => 'Incorrect data!']);
    }
}