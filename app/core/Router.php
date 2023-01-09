<?php

namespace App\Core;

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
            $this->response->setHttpStatusCode( 404 );
            return $this->View( 'not_found/404' );
        }

        if ( is_string( $callback ) ) {
            return $this->View( $callback );
        }

        if ( is_array( $callback ) ) {
            Application::$app->controller = new $callback[0]();
            $callback[0]                  = Application::$app->controller;
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
