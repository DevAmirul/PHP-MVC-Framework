<?php

use Devamirul\PhpMicro\core\Foundation\Application\Application;
use Devamirul\PhpMicro\core\Foundation\Application\Events\Event;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\View;
use Devamirul\PhpMicro\core\Foundation\Auth\Auth;
use Devamirul\PhpMicro\core\Foundation\Exceptions\NotFoundException;
use Devamirul\PhpMicro\core\Foundation\Session\FlushMessage;
use Devamirul\PhpMicro\core\Foundation\Session\Session;
use Dotenv\Dotenv;

if (!function_exists('app')) {
    /**
     * Get Application instance.
     */
    function app(): Application {
        return Application::singleton();
    }
}

if (!function_exists('config')) {
    /**
     * Get config data.
     */
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
    /**
     * Get env data.
     */
    function env(string $key, string $default): string {
        $dotenv = Dotenv::createImmutable(APP_ROOT);
        $dotenv->safeLoad();

        return $_ENV[$key] ?? $default;
    }
}

if (!function_exists('dd')) {
    /**
     * View the data in details then exit the code.
     */
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
    /**
     * View the data in details.
     */
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

if (!function_exists('setTitle')) {
    /**
     * Set page title.
     */
    function setTitle(string $title): void {
        View::singleton()->setTitle($title);
    }
}

if (!function_exists('getTitle')) {
    /**
     * Get page title.
     */
    function getTitle(): string {
        return View::singleton()->getTitle();
    }
}

if (!function_exists('session')) {
    /**
     * Get session instance.
     */
    function session(): Session {
        return Session::singleton();
    }
}

if (!function_exists('flushMessage')) {
    /**
     * Get flushMessage instance.
     */
    function flushMessage(): FlushMessage {
        return FlushMessage::singleton();
    }
}

if (!function_exists('auth')) {
    /**
     * Get auth instance.
     */
    function auth(): Auth {
        return new Auth();
    }
}

if (!function_exists('passwordHash')) {
    /**
     * Get hashed password.
     */
    function passwordHash(string $password, string | int | null $algo = PASSWORD_DEFAULT, int $cost = 10): string {
        return password_hash($password, $algo, ["cost" => $cost]);
    }
}

if (!function_exists('event')) {
    /**
     * Get event instance.
     */
    function event(): Event {
        return Event::singleton();
    }
}

if (!function_exists('basePath')) {
    /**
     * Get app base path.
     */
    function basePath(string $path = null): string {
        return APP_ROOT . $path;
    }
}

if (!function_exists('url')) {
    /**
     * Get app url.
     */
    function url(string $path = null): string {
        return config('app', 'app_url');
    }
}
