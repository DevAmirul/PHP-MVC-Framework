<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Supports;

class url {

    /**
     * Get Random url.
     */
    public static function makeResetLink(string $email, string $path): string {
        return config('app', 'app_url') . $path . '?reset=' . bin2hex(random_bytes(40)) . '&email=' . $email;
    }

    /**
     * Get base path or It accepts a path,
     * which concatenates with the base path and returns you a new path.
     */
    public static function basePath(string $path = null): string {
        return APP_ROOT . $path;
    }

    /**
     * Get app url.
     */
    public static function url(string $path = null): string {
        return config('app', 'app_url');
    }

}
