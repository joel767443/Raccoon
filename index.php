<?php

use WebApp\Application;
use WebApp\Http\Controllers\ItemsController;

ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once "autoload.php";

$app = new Application(dirname(__DIR__));

$app->router->post('/items/create', [ItemsController::class, 'create']);

$app->run();
