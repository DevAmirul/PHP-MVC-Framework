<?php

namespace Devamirul\PhpMicro\core\Foundation\Application;

use Devamirul\PhpMicro\core\Foundation\Application\Container\AppContainer;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;
use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;

class Application extends AppContainer {
    use Singleton;

    private function __construct() {
        $this->callServiceProviders();
    }

    public function run(): void {
        try {
            $content = Router::resolve();

            if (is_array($content)) {
                echo var_export($content, true);
            }else {
                echo $content;
            }

        } catch (\Exception $error) {
            http_response_code($error->getCode());
            echo $error->getMessage();
        }
    }

    public function callServiceProviders(): void {
        $providers = config('app', 'providers');

        foreach ($providers as $class) {
            $provider = new $class($this);

            $provider->register();
            $provider->boot();
        }
    }
}