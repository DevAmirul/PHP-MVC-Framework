<?php

namespace App\Providers;

use Devamirul\PhpMicro\core\Foundation\Application\Container\BaseContainer;
use Devamirul\PhpMicro\core\Foundation\Application\Container\Interface\ContainerInterface;

class AppServiceProvider extends BaseContainer implements ContainerInterface {

    /**
     * Set home path.
     */
    public Const HOMEPATH = '/';

    /**
     * Set guest redirect path.
     */
    public Const GUESTPATH = '/login';


    /**
     * Register any application services.
     */
    public function register(): void {

        $this->app->bind('fahad', function () {
            return 'fahad container';
        });
    }

    /**
     * Bootstrap any application services
     * and if you want to do something before handling the request.
     */
    public function boot(): void {
        //
    }

}
