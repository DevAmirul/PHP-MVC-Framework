<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Container;

use Devamirul\PhpMicro\core\Foundation\Application\Application;
use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Database\BaseDatabase;
use Devamirul\PhpMicro\core\Foundation\Router\Router;
use Devamirul\PhpMicro\core\Foundation\Session\FlushMessage;
use Devamirul\PhpMicro\core\Foundation\Session\Session;
use Devamirul\PhpMicro\core\Foundation\View\View;

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

        $this->bind('Session', function () {
            return Session::singleton();
        });

        $this->bind('Flush', function () {
            return FlushMessage::singleton();
        });

        $this->bind('View', function () {
            return View::singleton();
        });

        $this->bind('Request', function () {
            return Request::singleton();
        });

        $this->bind('DB', function () {
            return BaseDatabase::singleton();
        });

    }
}
