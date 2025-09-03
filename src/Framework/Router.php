<?php

declare(strict_types=1);

namespace Framework;

class Router {
    private array $routes = [];

    public function add(string $path, string $method, array $controller) {
        $this->routes[] = [
            'path' => $this->normalizePath($path),
            'method' => strtoupper($method),
            'controller' => $controller
        ];
    }

    public function resolve(string $path, string $method){
        foreach($this->routes as $route) {
            if($route['method'] !== $method)
                continue;
            if($route['path'] !== $path)
                continue;

            $controller = $route['controller'][0];
            $function = $route['controller'][1];

            $controller = new $controller;
            $controller->$function();
            break;
        }
    }

    private function normalizePath(string $path){
        $path = trim($path, "/");
        $path = "/$path/";

        $path = preg_replace('#[/]{2,}#', '/', $path);

        return $path;
    }
}