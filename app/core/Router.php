<?php

namespace App\Core;

use App\Core\Exception\NotFoundException;

class Router {

    protected array $routes = [];
    public Request $request;
    public Response $response;

    /**
     * @param  App\Core\Request  $request
     * @param  App\Core\Response $response
     */
    public function __construct( Request $request, Response $response ) {
        $this->request  = $request;
        $this->response = $response;
    }

    /**
     * This function store all get method router in $routers[] array
     *
     * @param  string $path
     * @param  callback $callback
     * @return void
     */
    public function get( string $path, $callback ) {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * This function store all post method router in $routers[] array
     *
     * @param  string $path
     * @param  callback $callback
     * @return void
     */
    public function post( string $path, $callback ) {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * This method is called from the run method, this method resolves all routers.
     * And it is decided which router will do which job
     *
     * @return array
     */
    public function resolve() {
        $path     = $this->request->getPath();
        $method   = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ( $callback === false ) {
            throw new NotFoundException();
        }

        if ( is_string( $callback ) ) {
            return $this->View( $callback );
        }

        if ( is_array( $callback ) ) {
            $controller                   = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action           = $callback[1];
            $callback[0]                  = $controller;

            //execute middleware
            foreach ( $controller->getMiddleware() as $middleware ) {
                $middleware->execute();
            }
        }
        return call_user_func( $callback, $this->request );
    }

    /**
     * This view() method render and view html page in front you
     *
     * @param  string $view
     * @param  array  $params
     * @return string
     */
    public function View( string $view, array $params = [] ) {
        $layoutContent = $this->layoutContent();
        $viewContent   = $this->renderOnlyView( $view, $params );

        return str_replace( '{{content}}', $viewContent, $layoutContent );
    }

    /**
     * This method Set and include main layout name
     * then send view() method
     *
     * @return string
     */
    protected function layoutContent() {
        $layout = Application::$app->controller->layout ?? 'main';

        ob_start();
        include_once Application::$ROOT_DIR_PATH . "/views/layout/$layout.php";
        return ob_get_clean();
    }

    /**
     * This method include html content Based on user's needs
     * then send view() method
     *
     * @param string $view
     * @param array $params
     * @return string
     */
    protected function renderOnlyView( $view, $params ) {
        foreach ( $params as $key => $value ) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR_PATH . "/views/$view.php";
        return ob_get_clean();
    }

    /**
     * This method redirect any page.
     *
     * @param  string $redirectLink
     * @return void
     */
    public function redirect( string $redirectLink ) {
        header( 'Location: ' . $redirectLink );
    }
}
?>
