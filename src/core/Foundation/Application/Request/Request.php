<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Request;

use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;

class Request {
    use Singleton;

    private function __construct() {}

    /**
     * This function return user input path after remove all param and query.
     */
    public function url() {
        // $path     = $_SERVER['REQUEST_URI'] ?? '/';
        // $position = strpos($path, '?');

        // if ($position === false) return $path;

        // return substr($path, 0, $position);
        return parse_url($_SERVER['REQUEST_URI']);
    }

    /**
     * This function return user input method.
     */
    public function method(): string {
        return strtolower($_SERVER['REQUEST_METHOD']);
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
     * This function checks and returns whether input data valid or not.
     */
    public function input(string $key = '', mixed $default = null): mixed {
        if ($key) {
            if (isset($_REQUEST[$key])) {
                return filter_input(INPUT_SERVER, $_REQUEST[$key], FILTER_SANITIZE_SPECIAL_CHARS);
                // return $_REQUEST[$key];
            }
        } else {
            $input = [];

            foreach ($_REQUEST as $index => $value) {
                $input[$index] = filter_input(INPUT_SERVER, $index, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            return $input;
        }
        return $default;
    }

    public function all(): mixed {
        $all = [];

        foreach ($_REQUEST as $key => $value) {
            $all[$key] = filter_input(INPUT_SERVER, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $all;
    }
}
