<?php

use App\Providers\AppServiceProvider;
use Devamirul\PhpMicro\core\Foundation\Application\Container\Containers\ApplicationContainer;

return [

    /**
     * Application Name.
     */
    'app_name'  => env('APP_NAME', 'PhpMicroFramework'),

    /**
     * Application Url.
     */
    'app_url'   => env('APP_URL', 'http://localhost:8000'),

    /**
     * Application Home path.
     */
    'home_url'  => '/',

    /**
     * Application Timezone.
     */
    'timezone' => 'Asia/Dhaka',

    /**
     * Autoloaded All Service Providers.
     */
    'providers' => [
        ApplicationContainer::class,
        AppServiceProvider::class,
    ],

];