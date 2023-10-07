<?php

use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;

if (!function_exists('response')) {
    function response(int $code): void {
        http_response_code($code);
    }
}

if (!function_exists('abort')) {
    function abort(int $code = 404): void {
        response($code);
        redirect('');
    }
}

if (!function_exists('redirect')) {
    function redirect(string $redirectLink) {
        header('Location: ' . $redirectLink);
    }
}

if (!function_exists('route')) {
    function route(string $name, array | string $params = null) {
        Router::route($name, $params);
    }
}
