<?php

namespace Core;

class Router {
    public array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file): self {
        $router = new static();
        require $file;
        return $router;
    }

    public function get(string $uri, string $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post(string $uri, string $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct(string $uri, string $requestMethod)
    {
        if (array_key_exists($uri, $this->routes[$requestMethod])) {

            return $this->callAction(
                ...explode('@', $this->routes[$requestMethod][$uri])
            );
        }
        if ($requestMethod === 'GET') {
            return $this->callAction(
                ...explode('@', $this->routes['404'])
            );
        }
        throw new Exception("Route for URI: {$uri} not found");
    }

    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;
        if (!method_exists($controller, $action)) {
            $c = get_class($controller);
            throw new Exception("Action {$action} does not exist in controller {$c}");
        }
        return $controller->$action();
    }
}
