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
        $path = parse_url($this->normalizePath($path), PHP_URL_PATH);
        $method = strtoupper($method);

        foreach($this->routes as $route) {
            if(
                $route['method'] !== $method ||
                $route['path'] !== $path
            )
                continue;

            [$controller, $function] = $route['controller'];

            $controller = new $controller();
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