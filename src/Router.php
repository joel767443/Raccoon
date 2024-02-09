<?php

namespace WebApp;

use WebApp\Http\Requests\Request;
use WebApp\Http\Responses\Response;

class Router
{
    public Request $request;
    public Response $response;

    /**
     * @var array
     */
    protected array $routes = [];

    public function __construct(Request $request,  Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function post(string $path, array $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath(); // URI - e.g., /product/12
        $method = $this->request->method(); // GET, POST, etc.
        $callback = $this->routeExist($method, $path);

        if ($callback === false) {
            return $this->response->jsonResponse("URL $path Not found", 404, [], false);
        }

        // Instantiate the controller for call_user_func (PHP 8 and above)
        if (is_array($callback)) {
            [$controllerClass, $method] = $callback;

            if (!$this->functionExists($callback)) {
                return $this->response->jsonResponse("Method $method Not found", 404, [], false);
            }

            $controllerInstance = new $controllerClass($this->response);
            return call_user_func([$controllerInstance, $method], $this->request);
        }

        return call_user_func($callback, $this->request);
    }

    /**
     * @param string $method
     * @param string $path
     * @return false|string
     */
    public function routeExist(string $method, string $path)
    {
        return $this->routes[$method][$path] ?? false;
    }

    private function functionExists($callback): bool
    {
        return method_exists($callback[0], $callback[1]);
    }
}