<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Container;

use Devamirul\PhpMicro\core\Foundation\Application\Application;
use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Application\Router\Router;

trait AppContainer {

    public function registerAppContainer() {
        $request = Request::singleton();

        $this->bind('Router', function () use($request) {
            $router = Router::singleton();
            $router->setDependency($request);
            return $router;
        });

        $this->bind('App', function () {
            return Application::singleton();
        });

        // $this->bind('Session', function () {
        //     return Session::singleton();
        // });

    }
}
