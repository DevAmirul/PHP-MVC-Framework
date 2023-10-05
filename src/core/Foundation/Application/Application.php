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

        dd(Router::resolve());
    }

    // public function run() {
    //     try {
    //         echo $this->router->resolve();
    //     } catch ( \Exception$error ) {
    //         $this->response->setHttpStatusCode( $error->getCode() );
    //         echo $this->router->View( 'error/errorPage', ['exception' => $error] );
    //     }
    // }
}
