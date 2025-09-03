<?php

declare(strict_types=1);

namespace Framework;

use Framework\Router;

class App {

    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run() {
        $method = $_SERVER["REQUEST_METHOD"];
        $path = $_SERVER["REQUEST_URI"];
        $this->router->resolve($path, $method);
    }

    public function addRoute(string $path, string $method, array $controller) {
        $this->router->add($path, $method, $controller);
        return $this;
    }
}