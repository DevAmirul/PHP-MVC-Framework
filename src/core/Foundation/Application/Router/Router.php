<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Router;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;

class Router {
    use Singleton;

    private array $routes = [];

    public Request $request;

    private function __construct() {
    }

    public function setDependency(Request $request) {
        $this->request = $request;
    }

    public function addRoute(string $method, string $path, array | callable $callback): void {
        $this->routes[$method][$path] = [
            'callback' => $callback,
        ];
    }

    /**
     * This function store all get method router in $routers[] array.
     */
    public function get(string $path, $callback) {
        $this->addRoute('get', $path, $callback);
    }

    /**
     * This function store all post method router in $routers[] array.
     */
    public function post(string $path, $callback) {
        $this->addRoute('get', $path, $callback);
    }

    /**
     * This method is called from the run method, this method resolves all routers.
     * And it is decided which router will do which job.
     */
    public function resolve() {
        $path = $this->request->url();
        return $path;
        // $method   = $this->request->method();
        // $callback = $this->routes[$method][$path] ?? false;

        // // if ($callback === false) {
        // //     throw new NotFoundException();
        // // }

        // // if (is_string($callback)) {
        // //     return $this->View($callback);
        // // }

        // if (is_array($callback)) {
        //     $controller                   = new $callback[0]();
        //     Application::$app->controller = $controller;
        //     $controller->action           = $callback[1];
        //     $callback[0]                  = $controller;

        //     //execute middleware method.
        //     $allMiddleware = Application::$app->registerMiddleware->registerMiddleware();
        //     foreach ($allMiddleware as $middleware) {
        //         $middleware->execute();
        //     }
        // }
        // return call_user_func($callback, $this->request);
    }

    /**
     * This view() method render and view html page in front you.
     */
    // public function View(string $view, array $params = []) {
    //     return Application::$app->view->View($view, $params);
    // }

    function getRouters() {
        return $this->routes;
    }
}
