<?php

namespace WebApp\Http\Responses;

class Response
{
    public function jsonResponse(string $message, int $code, array $data, bool $isSuccess = true): array
    {
        $this->allowOrigin();

        $this->setStatusCode($code);

        return [
            "success" => $isSuccess,
            "code" => $code,
            "message" => $message,
            "data" => $data
        ];
    }

    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    /**
     * @return void
     */
    public function allowOrigin(): void
    {
        header("Access-Control-Allow-Origin: *");

        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            // Handle pre-flight request. Respond successfully to OPTIONS requests.
            header("HTTP/1.1 200 OK");
            exit();
        }
    }
}