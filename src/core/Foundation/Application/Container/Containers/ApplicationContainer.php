<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Container\Containers;

use Devamirul\PhpMicro\core\Foundation\Application\Application;
use Devamirul\PhpMicro\core\Foundation\Application\Container\BaseContainer;
use Devamirul\PhpMicro\core\Foundation\Application\Container\Interface\ContainerInterface;
use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Auth\Auth;
use Devamirul\PhpMicro\core\Foundation\Database\BaseDatabase;
use Devamirul\PhpMicro\core\Foundation\Router\Router;
use Devamirul\PhpMicro\core\Foundation\Session\FlushMessage;
use Devamirul\PhpMicro\core\Foundation\Session\Session;
use Devamirul\PhpMicro\core\Foundation\View\View;

class ApplicationContainer extends BaseContainer implements ContainerInterface {

    /**
     * Register any application services.
     */
    public function register(): void {
        $this->app->bind('App', function () {
            return Application::singleton();
        });

        $this->app->bind('Request', function () {
            return Request::singleton();
        });

        $this->app->bind('Session', function () {
            return Session::singleton();
        });

        $this->app->bind('Flush', function () {
            return FlushMessage::singleton();
        });

        $this->app->bind('DB', function () {
            return BaseDatabase::singleton();
        });

        $this->app->bind('Auth', function () {
            return new Auth();
        });

        $this->app->bind('Router', function () {

            $router = Router::singleton();

            $router->setDependency(Request::singleton());

            return $router;
        });

        $this->app->bind('View', function () {
            return View::singleton();
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