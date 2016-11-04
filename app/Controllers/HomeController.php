<?php

namespace App\Controllers;

use App\Controllers\ControllerInterface;

/**
 * Class HomeController
 *
 * @package App\Controllers
 */
class HomeController extends BaseController
{
    public function fire()
    {
        return $this->view('index');
    }
}