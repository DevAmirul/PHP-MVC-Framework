<?php

namespace App\Core;

class Application {

    public static $ROOT_DIR_PATH;
    public Router $router;
    public Request $request;
    public Response $response;
    public static $app;

    public function __construct(String $driPath) {
        self::$app = $this;
        self::$ROOT_DIR_PATH = $driPath;
        $this->request= new Request();
        $this->response= new Response();
        $this->router = new Router($this->request,$this->response);
    }

    public function run() {
        echo $this->router->resolve();
    }
}
