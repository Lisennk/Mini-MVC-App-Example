<?php

namespace App\Controllers;

use App\Controllers\Base\BaseController;

/**
* Class LangController
* @package App\Controllers
*/
class LangController extends BaseController
{
    /**
     * Site supports only 2 languages for the first time, so we can change language
     * only from ru to en (default) and from en (default) to ru.
     *
     * I can expand this code in the future.
     */
    public function fire()
    {
        if (isset($_COOKIE['lang'])) {
            setcookie('lang', null, -1);
        } else {
            setcookie('lang', 'ru', time() + 3600 * 24 * 30);
        }

        header('Location: /');
    }
}