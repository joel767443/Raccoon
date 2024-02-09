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

    public function index(): array
    {
        $items = [
            ['id' => 1, 'name' => 'Laptop', 'description' => 'Powerful and lightweight', 'color' => 'Silver', 'checked' => false, 'price' => 999.99],
            ['id' => 2, 'name' => 'Smartphone', 'description' => 'High-end mobile device', 'color' => 'Black', 'checked' => false, 'price' => 699.99],
            ['id' => 3, 'name' => 'Running Shoes', 'description' => 'Comfortable athletic shoes', 'color' => 'Blue', 'checked' => false, 'price' => 79.99],
            ['id' => 4, 'name' => 'Coffee Maker', 'description' => 'Automatic drip coffee machine', 'color' => 'Red', 'checked' => false, 'price' => 49.99],
            ['id' => 5, 'name' => 'Bluetooth Earbuds', 'description' => 'Wireless earphones with noise cancellation', 'color' => 'White', 'checked' => false, 'price' => 129.99],
            ['id' => 6, 'name' => 'Backpack', 'description' => 'Spacious and durable backpack', 'color' => 'Green', 'checked' => false, 'price' => 59.99],
            ['id' => 7, 'name' => 'Digital Camera', 'description' => 'High-resolution camera with zoom', 'color' => 'Black', 'checked' => false, 'price' => 499.99],
            ['id' => 8, 'name' => 'Desk Chair', 'description' => 'Ergonomic office chair', 'color' => 'Gray', 'checked' => false, 'price' => 149.99],
            ['id' => 9, 'name' => 'T-shirt', 'description' => 'Casual cotton t-shirt', 'color' => 'Navy', 'checked' => false, 'price' => 19.99],
            ['id' => 10, 'name' => 'Headphones', 'description' => 'Over-ear headphones with deep bass', 'color' => 'Silver', 'checked' => false, 'price' => 89.99]
        ];
        return $this->response->jsonResponse("All items", 200, $items);
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