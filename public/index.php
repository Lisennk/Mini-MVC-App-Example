<?php

require_once '../vendor/autoload.php';

use Foundation\App;

$routes = include('../routes/web.php');
$action = isset($routes[$_SERVER['REQUEST_URI']]) ? $routes[$_SERVER['REQUEST_URI']] : '/404';

$app = new App();
echo $app->run($action);