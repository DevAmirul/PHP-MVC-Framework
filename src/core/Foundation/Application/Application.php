<?php

namespace Devamirul\PhpMicro\core\Foundation\Application;

use App\Containers\Container;
use Devamirul\PhpMicro\core\Foundation\Application\Container\AppContainer;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;
use Devamirul\PhpMicro\core\Foundation\Application\Traits\BaseContainer;
use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;

class Application {
    use BaseContainer, Singleton, AppContainer, Container;

    private function __construct() {
        $this->registerAppContainer();
        $this->registerContainer();

    }

    public function run() {
        try {
            echo Router::resolve();
        } catch (\Exception $error) {
            echo $error;
        }
    }
}
