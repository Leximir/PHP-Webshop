<?php

namespace Core;

use Http\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function get($uri, $controller)
    {

        return $this->addToRoutes($uri, "app/Http/controllers/" . $controller, "GET");

    }

    public function addToRoutes($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }

    public function post($uri, $controller)
    {

        return $this->addToRoutes($uri, "app/Http/controllers/" . $controller, "POST");

    }

    public function delete($uri, $controller)
    {

        return $this->addToRoutes($uri, "app/Http/controllers/" . $controller, "DELETE");

    }

    public function patch($uri, $controller)
    {

        return $this->addToRoutes($uri, "app/Http/controllers/" . $controller, "PATCH");

    }

    public function put($uri, $controller)
    {

        return $this->addToRoutes($uri, "app/Http/controllers/" . $controller, "PUT");

    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // Apply the middleware
                if ($route['middleware']) {
                    $middleware = Middleware::MAP[$route['middleware']];
                    (new $middleware)->handle();
                }
//               The if statement above is the same as the multiple if statements bellow
//                if($route['middleware'] === 'guest'){
//                    (new Guest)->handle();
//                }
//
//                if($route['middleware'] === 'auth'){
//                    (new Auth)->handle();
//                }

                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        require base_path('views/' . $code . '.php');
        die();
    }
}