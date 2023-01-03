<?php

namespace App\Core;

class Application {

    public static $app;
    public static $ROOT_DIR_PATH;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Database $db;

    /**
     * Application __construct function
     *
     * @param string $driPath
     */
    public function __construct( string $ROOT_DIR_PATH, array $config ) {
        self::$app           = $this;
        self::$ROOT_DIR_PATH = $ROOT_DIR_PATH;
        $this->request       = new Request();
        $this->response      = new Response();
        $this->router        = new Router( $this->request, $this->response );
        $this->db            = new Database( $config['db'] );
    }

    /**
     * Application run start from this function.
     */
    public function run() {
        echo $this->router->resolve();
    }
}
