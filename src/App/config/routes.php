<?php

declare(strict_types=1);

use App\Controllers\AuthController;
use Framework\App;

function registerRoutes(App $app) {
    $app
        ->addRoute('/', 'GET', [AuthController::class, 'view'])
        ->addRoute('/', 'POST', [AuthController::class, 'login']);
}