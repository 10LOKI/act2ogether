<?php

namespace App\Core;

class Router
{
    private $routes = [];
    
    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }
    
    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;
    }
    
    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = str_replace('/actTogether/public', '', $uri);
        
        if ($path === '' || $path === '/') {
            $path = '/';
        }
        
        if (isset($this->routes[$method][$path])) {
            return $this->dispatch($this->routes[$method][$path]);
        }
        
        foreach ($this->routes[$method] ?? [] as $route => $callback) {
            $pattern = preg_replace('/\{[^}]+\}/', '([^/]+)', $route);
            if (preg_match("#^{$pattern}$#", $path, $matches)) {
                array_shift($matches);
                return $this->dispatch($callback, $matches);
            }
        }
        
        http_response_code(404);
        echo "Page non trouvée";
    }
    
    private function dispatch($callback, $params = [])
    {
        if (is_array($callback)) {
            $controller = new $callback[0]();
            $method = $callback[1];
            return $controller->$method(...$params);
        }
        
        return $callback(...$params);
    }
}