<?php

use App\Controllers\HomeController;
use App\Controllers\SignUpController;
use App\Controllers\AuthController;
use App\Controllers\ExitController;
use App\Controllers\LangController;

/**
 * App Routes Map
 */

return [
    '/'        => HomeController::class,
    '/sign-up' => SignUpController::class,
    '/sign-in' => AuthController::class,
    '/exit'    => ExitController::class,
    '/lang'    => LangController::class
];