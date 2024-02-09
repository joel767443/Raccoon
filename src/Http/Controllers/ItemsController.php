<?php

namespace WebApp\Http\Controllers;

use WebApp\Http\Responses\Response;

/**
 * Class ItemsController
 * @property Response $response
 */
class ItemsController
{

    /**
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return array
     */
    public function create(): array
    {
        $item = [];
        return $this->response->jsonResponse("Item created.", 200, $item);
    }

    /**
     * @return array
     */
    public function update(): array
    {
        $item = [];
        return $this->response->jsonResponse("Item updated.", 200, $item);
    }

    /**
     * @return array
     */
    public function delete(): array
    {
        return $this->response->jsonResponse("Item deleted.", 200, []);
    }
}