<?php

namespace Devamirul\PhpMicro\core\Foundation\Application;

use Devamirul\PhpMicro\core\Foundation\Application\Container\AppContainer;
use Devamirul\PhpMicro\core\Foundation\Application\Container\BaseContainer\BaseContainer;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;
use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;

class Application extends BaseContainer {
    use Singleton, AppContainer, Container;

    private function __construct() {
        $this->registerAppContainer();
        $this->registerContainer();

    }

    public function run() {
        try {
            echo var_export(Router::resolve(), true);
        } catch (\Exception $error) {
            echo $error;
        }
    }
}
