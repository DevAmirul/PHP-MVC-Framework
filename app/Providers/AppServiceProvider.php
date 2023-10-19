<?php

namespace App\Providers;

use Devamirul\PhpMicro\core\Foundation\Application\Container\BaseContainer;
use Devamirul\PhpMicro\core\Foundation\Application\Container\Interface\ContainerInterface;

class AppServiceProvider extends BaseContainer implements ContainerInterface {

    /**
     * Register any application services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap any application services
     * and if you want to do something before handling the request.
     */
    public function boot(): void {
        //
    }

}
