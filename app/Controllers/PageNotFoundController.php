<?php

namespace App\Controllers;

/**
 * Class PageNotFoundController
 * @package App\Controllers
 */
class PageNotFoundController implements ControllerInterface
{
    /**
     * @return string
     */
    public function fire()
    {
        header("HTTP/1.0 404 Not Found");
        return '404 Page Not Found';
    }
}