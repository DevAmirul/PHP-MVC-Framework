<?php

use App\Providers\AppServiceProvider;
use Devamirul\PhpMicro\core\Foundation\Application\Container\Containers\ApplicationContainer;

return [
    'app_name'   => env('APP_NAME', 'PhpMicroFramework'),

    'app_url'    => env('APP_URL', 'http://localhost:8000'),

    'home_url'   => '/',

    'debug_mode' => env('APP_DEBUG', true),

    'providers'  => [
        ApplicationContainer::class,
        AppServiceProvider::class,
    ],
];