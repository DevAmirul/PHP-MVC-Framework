<?php

return [

    'middleware' => [
        'auth'  => App\Http\Middleware\AuthMiddleware::class,
        'guest' => App\Http\Middleware\GuestMiddleware::class,
        'csrf'  => Devamirul\PhpMicro\core\Foundation\Middleware\Middlewares\CsrfMiddleware::class,
    ],

    'get'        => [],
    'post'       => [ 'csrf' ],
    'put'        => [ 'csrf' ],
    'patch'      => [ 'csrf' ],
    'delete'     => [ 'csrf' ],

];