<?php

namespace Foundation;

use App\Controllers\PageNotFoundController;
use App\Controllers\Base\ControllerInterface;

/**
 * Class App
 * @package Foundation
 */
class App
{
    /**
     * Runs controller
     *
     * @param $controllerClass
     * @return string
     */
    public function run($controllerClass)
    {
        if (is_subclass_of($controllerClass, ControllerInterface::class)) {
            $controller = new $controllerClass;
        } else {
            $controller = new PageNotFoundController();
        }

        try {
            return $controller->fire();
        } catch (\Exception $e) {
            header('Location: /');
            return 'Error: ' . $e;
        }
    }
}