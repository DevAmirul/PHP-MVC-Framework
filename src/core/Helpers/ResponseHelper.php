<?php

use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\View;

if (!function_exists('responseCode')) {
    function responseCode(int $code): void {
        http_response_code($code);
    }
}

if (!function_exists('abort')) {
    function abort(int $code = 404, string $message = '') {
        // responseCode($code);
        return view('errors/' . $code, [
            'message' => $message,
            'code'=> $code
        ]);
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

if (!function_exists('view')) {
    function view(string $path, ?array $data = null) {
        return View::view($path, $data);
    }
}
