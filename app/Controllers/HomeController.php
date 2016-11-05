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
     * Display sign up/sign in form or user profile
     *
     * @return mixed
     */
    public function fire()
    {
        if (Auth::check()) {
            return $this->view('index', ['user' => Auth::user()]);
        } else {
            return $this->view('index');
        }
    }
}