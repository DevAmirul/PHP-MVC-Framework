<?php

namespace Devamirul\PhpMicro\core\Foundation\Router;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;
use Devamirul\PhpMicro\core\Foundation\Middleware\BaseMiddleware;
use Exception;

class Router {
    use Singleton;

    private string $method;
    private array $routes = [];
    private array $routeNames = [];

    public Request $request;

    private function __construct() {}

    public function setDependency(Request $request) {
        $this->request = $request;
    }

    public function addRoute(string $method, string $path, array | callable $callback): Router {
        $this->method = $method;

        $path = ltrim($path, '/');

        $this->routes[$method][] = [
            'path'       => ($path === '/') ? '/' : explode('/', $path),
            'callback'   => $callback,
            'name'       => null,
            'middleware' => config('middleware', $this->method) ? config('middleware', $this->method) : null,
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
        return $this->addRoute('put', $path, $callback);
    }

    /**
     * This function store all post method router in $routers[] array.
     */
    public function patch(string $path, $callback) {
        return $this->addRoute('patch', $path, $callback);
    }

    /**
     * This function store all post method router in $routers[] array.
     */
    public function delete(string $path, $callback) {
        return $this->addRoute('delete', $path, $callback);
    }

    /**
     *
     */
    public function name(string $name) {
        if (!empty($this->routeNames)) {
            if (in_array($name, $this->routeNames)) {
                throw new Exception('Router name (' . $name . ') has been used more than once');
            }
        }
        $this->routes[$this->method][array_key_last($this->routes[$this->method])]['name'] = $name;

        array_push($this->routeNames, $name);

        return $this;
    }

    /**
     *
     */
    public function middleware(string | array $middlewareNames): Router {

        $this->routes[$this->method][array_key_last($this->routes[$this->method])]['middleware'][] = $middlewareNames;

        return $this;
    }

    /**
     *
     */
    public function where(string | array $expression = null) {
        if (is_string($expression)) {
            $this->routes[$this->method][array_key_last($this->routes[$this->method])]['where'] = [$expression];
        } else {
            $this->routes[$this->method][array_key_last($this->routes[$this->method])]['where'] = $expression;
        }
        return $this;
    }

    /**
     * This method is called from the run method, this method resolves all routers.
     * And it is decided which router will do which job.
     */
    public function resolve() {
        // dd($this->routes);

        $path = explode('/', ltrim($this->request->path(), '/'));

        if (isset($this->routes[$this->request->method()])) {

            foreach ($this->routes[$this->request->method()] as $routes) {
                $url        = '';
                $params     = [];
                $whereIndex = 0;

                if (sizeof($routes['path']) === sizeof($path)) {

                    foreach ($routes['path'] as $key => $route) {

                        if ($route === $path[$key]) {
                            $url .= '/' . $path[$key];

                            // dd($this->routes);
                        } elseif (str_starts_with($route, ':')) {

                            if ($routes['where']) {
                                if (!preg_match('/' . $routes['where'][$whereIndex] . '/', $path[$key])) {
                                    throw new Exception('expression not match');
                                }
                                $whereIndex++;
                            }
                            $params[] = $path[$key];

                            $url .= '/' . $path[$key];
                        } else {
                            break;
                        }
                        // dd($path);
                    }

                    if (ltrim($this->request->path(), '/') === ltrim($url, '/')) {
                        if (!$url) {
                            throw new Exception('route not match', 404);
                        }

                        BaseMiddleware::resolve($routes['middleware']);

                        if (is_callable($routes['callback'])) {
                            // dd($routes['path']);

                            return call_user_func($routes['callback'], ...$params);

                        } elseif (is_array($routes['callback'])) {

                            if (is_string($routes['callback'][0]) && is_string($routes['callback'][1])) {
                                $controllerInstance = new $routes['callback'][0];

                                return call_user_func_array(
                                    [$controllerInstance, $routes['callback'][1]],
                                    [$this->request]
                                );
                            }
                        }
                    }
                }
            }
            throw new Exception('route not match', 404);
        } else {
            throw new Exception('method not match');
        }
    }

    public function route(string $name, string | array $params = null) {

        foreach ($this->routes[$this->request->method()] as $routes) {
            if ($routes['name'] === $name) {

                if (is_string($params)) {
                    $params = array($params);
                }

                if (!$routes['where']) {
                    $url        = '';
                    $whereIndex = 0;
                    // dd($routes['where']);

                    foreach ($routes['path'] as $key => $value) {
                        if (str_starts_with($value, ':') && $params) {
                            $url .= '/' . $params[$whereIndex];
                            $whereIndex++;

                        } elseif (str_starts_with($value, ':') && !$params) {
                            throw new Exception('param missing');
                        } elseif (!str_starts_with($value, ':') && $params) {
                            throw new Exception('send extra params in route func');
                        } else {
                            $url .= '/' . $value;
                        }
                    }

                    redirect($url);

                } elseif (isset($routes['where']) && isset($params) && (sizeof($params) === sizeof($routes['where']))) {

                    // dd($routes['where']);
                    foreach ($routes['where'] as $key => $value) {
                        if (!preg_match('/' . $value . '/', $params[$key])) {
                            throw new Exception('expression not match');
                        }
                    }

                    $url        = '';
                    $whereIndex = 0;

                    foreach ($routes['path'] as $key => $value) {
                        if (str_starts_with($value, ':')) {
                            $url .= '/' . $params[$whereIndex];
                            $whereIndex++;
                        } else {
                            $url .= '/' . $value;
                        }
                    }

                    redirect($url);
                } else {
                    // throw new Exception('route params where condition not matching');
                    throw new Exception('route params where condition not matching or not define any params');
                }

            }
        }
        throw new Exception('route name not found');
    }

}
