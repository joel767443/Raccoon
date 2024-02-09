<?php

use WebApp\Application;
use WebApp\Http\Controllers\ItemsController;

ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once "autoload.php";

$app = new Application(dirname(__DIR__));

$app->router->get('/api/items', [ItemsController::class, 'index']);
$app->router->post('/api/items/create', [ItemsController::class, 'create']);
$app->router->post('/items/1/delete', [ItemsController::class, 'delete']);
$app->router->post('/api/items/update', [ItemsController::class, 'update']);

$app->run();
