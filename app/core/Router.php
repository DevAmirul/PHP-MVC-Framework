<?php

namespace App\Core;

class Router {

    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct( Request $request, Response $response ) {
        $this->request  = $request;
        $this->response = $response;
    }

    public function get( $path, $callback ) {
        $this->routes['get'][$path] = $callback;
    }

    public function post( $path, $callback ) {
        $this->routes['post'][$path] = $callback;
    }
    ///////////////
    public function resolve() {
        $path     = $this->request->getPath();
        $method   = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ( $callback === false ) {
            $this->response->setHttpStatusCode( 404 );
            return $this->View( 'not_found/404' );

        }

        if ( is_string( $callback ) ) {
            return $this->View( $callback );
        }

        if ( is_array( $callback ) ) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        return call_user_func( $callback, $this->request );
    }

    public function View( $view, $params = [] ) {
        $layoutContent = $this->layoutContent();
        $viewContent   = $this->renderOnlyView( $view, $params );

        return str_replace( '{{content}}', $viewContent, $layoutContent );
    }

    protected function layoutContent() {
        $layout = Application::$app->controller->layout ?? 'main';
        ob_start();
        include_once Application::$ROOT_DIR_PATH . "/views/layout/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView( $view, $params ) {
        foreach ( $params as $key => $value ) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR_PATH . "/views/$view.php";
        return ob_get_clean();
    }

}
?>
