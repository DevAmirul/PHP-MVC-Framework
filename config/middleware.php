<?php

return [

    /**
     * Autoloaded All Middleware.
     */
    'middleware' => [
        'auth'  => App\Http\Middlewares\AuthMiddleware::class,
        'guest' => App\Http\Middlewares\GuestMiddleware::class,
        'csrf'  => Devamirul\PhpMicro\core\Foundation\Middleware\Middlewares\CsrfMiddleware::class,
    ],

    /**
     * In the following methods you can set some middleware alias name as default.
     */
    'get'        => [],
    'post'       => [ 'csrf' ],
    'put'        => [ 'csrf' ],
    'patch'      => [ 'csrf' ],
    'delete'     => [ 'csrf' ],

];