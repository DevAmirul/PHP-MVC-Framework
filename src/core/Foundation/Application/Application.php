<?php

namespace Devamirul\PhpMicro\core\Foundation\Application;

use App\Containers\Container;
use Devamirul\PhpMicro\core\Foundation\Application\Container\AppContainer;
use Devamirul\PhpMicro\core\Foundation\Application\Container\BaseContainer\BaseContainer;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;
use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;

class Application extends BaseContainer {
    use Singleton;

    private function __construct() {
        (new AppContainer)->register();
        (new Container)->register();
    }

    public function run() {
        try {
            echo var_export(Router::resolve(), true);
        } catch (\Exception $error) {
            http_response_code($error->getCode());
            echo $error->getMessage();
        }
    }
}
