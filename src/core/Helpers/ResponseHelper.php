<?php

use Devamirul\PhpMicro\core\Foundation\Application\Redirect\Redirect;
use Devamirul\PhpMicro\core\Foundation\Router\Router;
use Devamirul\PhpMicro\core\Foundation\View\View;

if (!function_exists('abort')) {
    /**
     * Throw an HttpException with the given data.
     */
    function abort(int $code = 404, string $message = ''): string {
        return View::singleton()->status($code)->view('errors/' . $code, [
            'message' => $message,
            'code'    => $code,
        ]);
    }
}

if (!function_exists('redirect')) {
    /**
     * Get an instance of the redirect.
     */
    function redirect(string $redirectLink): Redirect {
        return (new Redirect())->redirect($redirectLink);
    }
}

if (!function_exists('back')) {
    /**
     * Create a new redirect response to the previous location.
     */
    function back(): Redirect {
        return (new Redirect())->back();
    }
}

if (!function_exists('route')) {
    /**
     * Generate route name to a url.
     */
    function route(string $name, array | string $params = null): void {
        Router::singleton()->route($name, $params);
    }
}

if (!function_exists('view')) {
    /**
     * Get the evaluated view contents for the given view.
     */
    function view(string $path, ?array $data = null): string {
        return View::singleton()->view($path, $data);
    }
}

if (!function_exists('status')) {
    /**
     * Set the response status code with the view content.
     */
    function status(int $code): View {
        return View::singleton()->status($code);
    }
}
