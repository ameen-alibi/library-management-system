<?php

namespace Core;


class Application
{

    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function route($method, $path, $callback)
    {
        $this->router->add($method, $path, $callback);
    }

    public function run()
    {
        echo $this->router->resolve(new Request(),new Response());
    }
}
