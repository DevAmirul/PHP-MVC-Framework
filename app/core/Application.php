<?php

namespace App\Core;

use App\Core\Controller;

class Application {

    public static $ROOT_DIR_PATH;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public static $app;

    /**
     * Application __construct function
     *
     * @param string $driPath
     */
    public function __construct( string $ROOT_DIR_PATH ) {
        self::$app           = $this;
        self::$ROOT_DIR_PATH = $ROOT_DIR_PATH;
        $this->request       = new Request();
        $this->response      = new Response();
        $this->router        = new Router( $this->request, $this->response );
    }

    /**
     * Application run start this function.
     */
    public function run() {
        echo $this->router->resolve();
    }
}
