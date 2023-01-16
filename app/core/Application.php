<?php

namespace App\Core;

use App\RegisterMiddleware;

class Application {

    public static $app;
    public static $ROOT_DIR_PATH;
    public string $userClass;
    public Router $router;
    public View $view;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Database $db;
    public Session $session;
    public RegisterMiddleware $registerMiddleware;

    /**
     * Application __construct function
     *
     * @param string $driPath
     */
    public function __construct( string $ROOT_DIR_PATH, array $config ) {
        self::$app                = $this;
        self::$ROOT_DIR_PATH      = $ROOT_DIR_PATH;
        $this->request            = new Request();
        $this->response           = new Response();
        $this->router             = new Router( $this->request, $this->response );
        $this->view               = new View();
        $this->db                 = new Database( $config['db'] );
        $this->session            = new Session();
        $this->registerMiddleware = new RegisterMiddleware();
    }

    /**
     * The application will run from this function
     */
    public function run() {
        try {
            echo $this->router->resolve();
        } catch ( \Exception$error ) {
            $this->response->setHttpStatusCode( $error->getCode() );
            echo $this->router->View( 'error/errorPage', ['exception' => $error] );
        }
    }

    public function isGuest( $user = 'user' ) {
        return ( $this->session->get( $user ) ) ? false : true;
    }
}
