<?php

declare(strict_types=1);

namespace App\Core;

class Router
{
    private array $routes = [];

    public function add(
        string $method,
        string $path,
        callable $action
    ): void {
        $this->routes[$method][$path] = $action;
    }

    public function dispatch(
        string $method,
        string $path
    ): void {
        if (isset($this->routes[$method][$path])) {

            $action = $this->routes[$method][$path];

            $action();

            return;
        }

        http_response_code(404);

        echo 'Page introuvable';
    }
}