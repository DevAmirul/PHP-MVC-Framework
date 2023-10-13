<?php

use App\Providers\AppServiceProvider;
use App\Providers\EventServiceProvider;
use Devamirul\PhpMicro\core\Foundation\Application\Container\AppContainer;

return [
    'name' => env('APP_NAME', 'PhpMicroFramework'),

    'url'  => env('APP_URL', 'http://localhost'),

    'home_url' => '/home',

    'debug_mode' => env('APP_DEBUG', true),

    'providers'=> [
        AppContainer::class,
        AppServiceProvider::class,
        EventServiceProvider::class
    ]
];