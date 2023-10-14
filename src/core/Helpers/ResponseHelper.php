<?php

use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\View;
use Devamirul\PhpMicro\core\Foundation\Application\Redirect\Redirect;
use Devamirul\PhpMicro\core\Foundation\Session\FlushMessage;


if (!function_exists('abort')) {
    function abort(int $code = 404, string $message = '') {
        return status($code)->view('errors/' . $code, [
            'message' => $message,
            'code'=> $code
        ]);
    }
}

if (!function_exists('redirect')) {
    function redirect(string $redirectLink) {
        return (new Redirect())->redirect($redirectLink);
    }
}

if (!function_exists('back')) {
    function back() {
        return (new Redirect())->back();
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

if (!function_exists('status')) {
    function status(int $code) {
        return View::status($code);
    }
}
