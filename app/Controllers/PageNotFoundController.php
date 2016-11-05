<?php

namespace App\Controllers;

use App\Controllers\Base\BaseController;

/**
 * Class PageNotFoundController
 * @package App\Controllers
 */
class PageNotFoundController extends BaseController
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