<?php

namespace WebApp;

use WebApp\Http\Requests\Request;
use WebApp\Http\Responses\Response;

class Application
{
    public static string $ROOT_PATH;
    public Router $router;
    public Request $request;
    public Response $response;

    public function __construct($rootPath)
    {
        self::$ROOT_PATH = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo json_encode($this->router->resolve());
    }
}