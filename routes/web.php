<?php

use App\Controllers\HomeController;
use App\Controllers\SignUpController;

/**
 * App Routes Map
 */

return [
    '/' => HomeController::class,
    '/sign-up' => SignUpController::class
];