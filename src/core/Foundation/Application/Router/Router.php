<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Router;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;
use Devamirul\PhpMicro\core\Foundation\Middleware\BaseMiddleware;

class Router {
    use Singleton;

    private array $routes = [];

    public Request $request;

    private function __construct() {
    }

    public function setDependency(Request $request) {
        $this->request = $request;
    }

    public function addRoute(string $method, string $path, array | callable $callback): Router {
        $this->routes[$method][] = [
            'path'       => ($path === '/') ? '/' : explode('/', $path),
            'callback'   => $callback,
            'middleware' => null,
            'name'       => null,
            'where'      => null,
        ];
        return $this;
    }

    /**
     * This function store all get method router in $routers[] array.
     */
    public function get(string $path, $callback) {
        return $this->addRoute('get', $path, $callback);
    }

    /**
     * This function store all post method router in $routers[] array.
     */
    public function post(string $path, $callback) {
        return $this->addRoute('post', $path, $callback);
    }

    /**
     * This function store all post method router in $routers[] array.
     */
    public function put(string $path, $callback) {
        return $this->addRoute('get', $path, $callback);
    }

    /**
     * This function store all post method router in $routers[] array.
     */
    public function patch(string $path, $callback) {
        return $this->addRoute('get', $path, $callback);
    }

    /**
     * This function store all post method router in $routers[] array.
     */
    public function delete(string $path, $callback) {
        return $this->addRoute('get', $path, $callback);
    }

    /**
     *
     */
    public function name(string $name): Router {
        $currentUrl = $this->routes[$this->request->method()];

        $this->routes[$this->request->method()][array_key_last($currentUrl)]['name'] = $name;

        return $this;
    }

    /**
     *
     */
    public function middleware(string | array $names): Router {
        $currentUrl = $this->routes[$this->request->method()];

        $this->routes[$this->request->method()][array_key_last($currentUrl)]['middleware'] = $names;

        return $this;
    }

    /**
     *
     */
    public function where(string | array $name, string | array $expression = null) {
        $currentUrl = $this->routes[$this->request->method()];
        if (is_string($name)) {
            $this->routes[$this->request->method()][array_key_last($currentUrl)]['where'] = [$name => $expression];
        } else {
            $this->routes[$this->request->method()][array_key_last($currentUrl)]['where'] = $name;
        }
        return $this;
    }

    /**
     * This method is called from the run method, this method resolves all routers.
     * And it is decided which router will do which job.
     */
    public function resolve() {

        $path = explode('/', $this->request->path());

        foreach ($this->routes[$this->request->method()] as $routes) {
            $url = '';

            if (sizeof($routes['path']) === sizeof($path)) {

                foreach ($routes['path'] as $key => $route) {

                    if ($route == $path[$key]) {
                        $url .= '/' . $path[$key];

                    } elseif (str_starts_with($route, ':')) {

                        if ($routes['where']) {
                            // dd($routes['where']);
                            foreach ($routes['where'] as $keyName => $value) {
                                if (!preg_match('/' . $routes['where'][$keyName] . '/', $path[$key])) {
                                    throw new \Exception('expression not match');
                                }
                            }

                        }

                        $url .= '/' . $path[$key];
                    } else {
                        break;
                    }
                }

                if (substr($url, 1) === $this->request->path()) {

                    BaseMiddleware::resolve($routes['middleware']);

                    if (is_callable($routes['callback'])) {

                        return call_user_func($routes['callback'], $this->request);

                    } elseif (is_array($routes['callback'])) {

                        if (is_string($routes['callback'][0]) && is_string($routes['callback'][1])) {
                            $controllerInstance = new $routes['callback'][0];

                            call_user_func_array(
                                [$controllerInstance, $routes['callback'][1]],
                                [$this->request]
                            );
                        }
                    }
                }
            }
        }
        throw new \Exception('route not match');
    }

    public function route(string $name, ?array $params = null) {

        foreach ($this->routes[$this->request->method()] as $routes) {

            if ($routes['name'] === $name) {

                if (is_array($params) && (sizeof($params) === sizeof($routes['where']))) {

                    if ($routes['where']) {
                        // dd($routes['where']);
                        foreach ($routes['where'] as $key => $value) {
                            if (!preg_match('/' . $routes['where'][$key] . '/', $params[$key])) {
                                throw new \Exception('expression not match');
                            }
                        }
                    }
                }
                // TODO: 
                BaseMiddleware::resolve($routes['middleware']);


            }
        }
    }

    public function redirect(?string $path = null) {
        header('Location: ' . $path);
        return $this;
    }

}
