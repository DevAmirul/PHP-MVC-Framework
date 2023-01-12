<?php

namespace App\Core;

class Application {

    public static $app;
    public static $ROOT_DIR_PATH;
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Database $db;
    public Session $session;
    public  ? DbModel $user;

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
        $this->session       = new Session();
        // $this->userClass     = $config['userClass'];
        // $cla                 = new $this->userClass();
        // $primaryValue        = $this->session->get( 'user' );
        // if ( $primaryValue ) {
        //     $primaryKey = $cla->primaryKey;
        //     $this->user = $cla->findOne( [$primaryKey => $primaryValue] );
        // }

    }

    /**
     * Application run start from this function.
     */
    public function run() {
        echo $this->router->resolve();
    }

    public function login( DbModel $user ) {
        $this->session->set( 'user', $user );
        return true;
    }

    public function logout( string $key ) {
        $this->user = null;
        $this->session->remove( $key );
    }

    public function isGuest() {
        return ( $this->session->get( 'user' ) ) ? false : true;
    }
}
