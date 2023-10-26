<?php

use Devamirul\PhpMicro\core\Foundation\Application\Redirect\Redirect;
use Devamirul\PhpMicro\core\Foundation\Router\Router;
use Devamirul\PhpMicro\core\Foundation\View\View;

if (!function_exists('abort')) {
    /**
     * The abort function throws an HTTP exception which will be
     * rendered by the exception handler.
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
     * Redirect link.
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
     * Finds routes by route name and redirect this route.
     */
    function route(string $name, array | string $params = null): void {
        Router::singleton()->route($name, $params);
    }
}

if (!function_exists('view')) {
    /**
     * Get the evaluated view contents for the given view.
     */
    function view(string $path, ?array $params = null): string {
        return View::singleton()->view($path, $params);
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

if (!function_exists('layout')) {
    /**
     * Set the view layout.
     */
    function layout(string $layout = ''): View {
        return View::singleton()->layout($layout);
    }
}
