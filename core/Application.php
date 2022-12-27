<?php

namespace App;

class Application {

    public static $ROOT_DIR_PATH;
    public Router $router;
    public Request $request;

    public function __construct(String $driPath) {
        self::$ROOT_DIR_PATH = $driPath;
        $this->request= new Request();
        $this->router = new Router($this->request);
    }

    public function run() {
        echo $this->router->resolve();
    }
}
