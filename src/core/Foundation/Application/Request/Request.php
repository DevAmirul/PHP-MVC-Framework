<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Request;

use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;

class Request {
    use Singleton;

    private function __construct() {}

    /**
     * This function return user input path after remove all param and query.
     */
    public function path() {
        $url = parse_url($_SERVER['REQUEST_URI']);
        return trim($url['path']) ?? null;
    }

    public function query() {
        $url = parse_url($_SERVER['REQUEST_URI']);

        $query = $url['query'] ?? null;

        parse_str($query, $params);
        
        return $params;
    }

    /**
     * This function return user input method.
     */
    public function method(): string {
        $method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
        return strtolower($method);
    }

    /**
     * This function checks and returns whether the method is GET.
     */
    public function isGet(): string {
        return $this->method() === 'get';
    }

    /**
     * This function checks and returns whether the method is POST.
     */
    public function isPost(): string {
        return $this->method() === 'post';
    }

    /**
     *
     */
    public function isDelete(): string {
        return $this->method() === 'delete';
    }

    /**
     *
     */
    public function isPut(): string {
        return $this->method() === 'put';
    }

    /**
     *
     */
    public function isPatch(): string {
        return $this->method() === 'patch';
    }

    /**
     * This function checks and returns whether input data valid or not.
     */
    public function input(string $key = '', mixed $default = null): mixed {
        if ($key) {
            if (isset($_REQUEST[$key])) {
                return $_REQUEST[$key];
            }
        } else {
            $input = [];

            foreach ($_REQUEST as $index => $value) {
                $input[$index] = $value;
            }
            return $input;
        }
        return $default;
    }

    public function all(): mixed {
        $all = [];

        foreach ($_REQUEST as $key => $value) {
            $all[$key] = $value;
        }
        return $all;
    }

    public function only(): mixed {
        $only = [];

        $args = func_get_args();

        foreach ($args as $key) {
            if (isset($_REQUEST[$key])) {
                $only[$key] = $_REQUEST[$key];
            }
        }
        return $only;
    }
}
