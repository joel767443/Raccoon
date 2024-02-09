<?php

use WebApp\Application;

ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once "autoload.php";

$application = new Application();

var_dump($application);