<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Handle pre-flight request. Respond successfully to OPTIONS requests.
    header("HTTP/1.1 200 OK");
    exit();
}

return [
    'database' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '27HomeDev?',
        'databaseName' => 'vanilla',
    ],

];