<?php

use App\Controllers\HomeController;
use App\Controllers\SignUpController;
use App\Controllers\AuthController;

/**
 * App Routes Map
 */

return [
    '/' => HomeController::class,
    '/sign-up' => SignUpController::class,
    '/sign-in' => AuthController::class
];