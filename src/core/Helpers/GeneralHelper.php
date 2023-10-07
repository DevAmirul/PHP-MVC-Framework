<?php

use Devamirul\PhpMicro\core\Foundation\Application\Application;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\View;
use Devamirul\PhpMicro\core\Foundation\Exceptions\NotFoundException;
use Devamirul\PhpMicro\core\Foundation\Session\FlushMessage;
use Devamirul\PhpMicro\core\Foundation\Session\Session;
use Dotenv\Dotenv;

if (!function_exists('app')) {
    function app(): Application {
        return Application::singleton();
    }
}

if (!function_exists('config')) {
    function config(string $file, string $key): string | array {
        $data = require APP_ROOT . "/config/{$file}.php";
        if (isset($data[$key])) {
            return $data[$key];
        } else {
            throw new NotFoundException("Key:($key) Not Found");
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

if (!function_exists('vdd')) {
    function vdd(mixed $value): void {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }
}

if (!function_exists('dd')) {
    function dd(mixed $value): void {
        if (is_string($value)) {
            echo $value;
        } else {
            echo '<pre>';
            print_r($value);
            echo '</pre>';
        }
        die();
    }
}

if (!function_exists('dump')) {
    function dump(mixed $value): void {
        if (is_string($value)) {
            echo $value;
        } else {
            echo '<pre>';
            print_r($value);
            echo '</pre>';
        }
    }
}

/**
 * Set the value of title.
 */
if (!function_exists('setTitle')) {
    function setTitle(string $title): void {
        View::setTitle($title);
    }
}

/**
 * Get the value of title.
 */
if (!function_exists('getTitle')) {
    function getTitle(): string {
        return View::getTitle();
    }
}

if (!function_exists('session')) {
    function session(): Session {
        return Session::singleton();
    }
}

if (!function_exists('flush')) {
    function flush(): FlushMessage {
        return FlushMessage::singleton();
    }
}
