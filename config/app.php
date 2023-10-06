<?php

return [
    'name'       => env('APP_NAME', 'PhpMicroFramework'),

    'url'        => env('APP_URL', 'http://localhost'),

    'middleware' => [
        'auth'  => App\Http\Middleware\AuthMiddleware::class,
        'guest' => App\Http\Middleware\GuestMiddleware::class,
    ],
];