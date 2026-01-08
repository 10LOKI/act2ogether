<?php
namespace App\Core;

class Router
{
    public function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = trim($uri, '/');

        if ($uri === '' || $uri === 'home') {
            $controller = new \App\Controllers\HomeController();
            $controller->index();
            return;
        }

        // Very small stub router - extend as needed
        http_response_code(404);
        echo "Not Found";
    }
}
