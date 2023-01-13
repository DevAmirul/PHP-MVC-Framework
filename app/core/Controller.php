<?php

namespace App\Core;

use App\Core\Application;
use App\Core\Middleware\BaseMiddleware;

class Controller {

    public String $layout = 'main';
    public string $action = '';

    /**
     * @var App\Core\Middleware\BaseMiddleware
     */
    protected array $middleware = [];

    /**
     * Set html layout file name in this function
     *
     * @param string $layout
     * @return void
     */
    public function setLayout( string $layout ) {
        $this->layout = $layout;
    }

    /**
     * This method call original view method from Application::$app->router class.
     *
     * @param string $view
     * @param array $params
     * @return string
     */
    protected function view( string $view, array $params = [] ) {
        return Application::$app->router->view( $view, $params );
    }

    /**
     * This method call original redirect method from Application::$app->router class.
     *
     * @param  string $redirectLink
     * @return string
     */
    protected function redirect( string $redirectLink ) {
        return Application::$app->router->redirect( $redirectLink );
    }

    /**
     * This method call original setFlush method from Application::$app->session class.
     *
     * @return void
     */
    protected function setFlush( $key, $message ) {
        return Application::$app->session->setFlash( $key, $message );
    }

    /**
     * Here Register middleware
     *
     * @param  BaseMiddleware $middleware
     * @return void
     */
    public function registerMiddleware( BaseMiddleware $middleware ) {
        $this->middleware[] = $middleware;
    }

    /**
     * Middleware getters
     *
     * @return array
     */
    public function getMiddleware()
    {
        return $this->middleware;
    }
}