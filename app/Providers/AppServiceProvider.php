<?php

namespace App\Providers;

use Devamirul\PhpMicro\core\Foundation\Application\Container\BaseContainer;
use Devamirul\PhpMicro\core\Foundation\Application\Container\Interfaces\ContainerInterfaces;
use Devamirul\PhpMicro\core\Foundation\Events\Event;

class AppServiceProvider extends BaseContainer implements ContainerInterfaces {

    public Const HOMEPATH = '/';

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
     * If you want to do something before handling the request.
     */
    public function boot(): void {
        Event::listen('boot', function () {
            echo 'return form boot';
        });

        Event::trigger('boot');
    }
}
