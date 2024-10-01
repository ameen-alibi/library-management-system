<?php

namespace Core;

class Router
{
    protected array $routes;

    public function add($method,$path, $callback)
    {
        $this->routes[$method][$path] = $callback;
    }

    public function resolve(Request $request,Response $response)
    {
        $path = $request->getPath();
        $method = $request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        
        if (!$callback) {
            
            return "Error 404 !";
        }
        if (is_callable($callback)) {
            call_user_func_array($callback, []);
        }
        if (is_array($callback)) {
            call_user_func_array([new $callback[0], $callback[1]], []);
        }
    }
}
