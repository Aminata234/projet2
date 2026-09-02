<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Router\Router;

$router = new Router();

$router->add(
    'GET',
    '/',
    function (): void {
        require __DIR__ . '/../templates/home.php';
    }
);

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$path = parse_url(
    $_SERVER['REQUEST_URI'] ?? '/',
    PHP_URL_PATH
);

$router->dispatch(
    $method,
    $path
);