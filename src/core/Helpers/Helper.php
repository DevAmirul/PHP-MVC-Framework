<?php

use Devamirul\PhpMicro\core\Foundation\Application\Application;
use Dotenv\Dotenv;

if (!function_exists('app')) {
    function app(): Application {
        return Application::singleton();
    }
}

if (!function_exists('config')) {
    function config(string $target, string $key): string | array {
        $data = require APP_ROOT . "/config/{$target}.php";
        if (isset($data[$key])) {
            return $data[$key];
        } else {
            throw new Exception("Key:($key) Not Found");
        }
    }
}

if (!function_exists('env')) {
    function env(string $key, string $default): string {
        $dotenv = Dotenv::createImmutable(APP_ROOT);
        $dotenv->safeLoad();

        return $_ENV[$key] ?? $default;
    }
}

if (!function_exists('db')) {
    function db(string $key, string $value): void {

    }
}

if (!function_exists('request')) {
    function request(string $key, string $value): void {

    }
}

if (!function_exists('redirect')) {
    function redirect(string $redirectLink) {
        header('Location: ' . $redirectLink);
    }
}

if (!function_exists('response')) {
    function response(int $code): void {
        http_response_code($code);
    }
}

if (!function_exists('app')) {
    function app(string $key, string $value): void {

    }
}

if (!function_exists('session')) {
    function session(string $key, string $value): void {

    }
}

if (!function_exists('dd')) {
    function dd(mixed $value): void {
        var_dump($value);
        die();
    }
}

if (!function_exists('dump')) {
    function dump(mixed $value): void {
        var_dump($value);
    }
}

if (!function_exists('abort')) {
    function abort(int $code = 404): void {
        response($code);
        redirect('');
    }
}