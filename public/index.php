<?php

require_once '../vendor/autoload.php';

use Foundation\App;

$routes = include('../routes/web.php');
$action = $routes[$_SERVER['REQUEST_URI']];

$app = new App();
echo $app->run($action);