<?php

use Devamirul\PhpMicro\core\Foundation\Session\Session;

if (!function_exists('setCsrf')) {
    /**
     * Set new CSRF value.
     */
    function setCsrf(): string {
        if (!Session::singleton()->has('csrf')) {
            Session::singleton()->set('csrf', bin2hex(random_bytes(50)));
        }
        return '<input type="hidden" name="csrf" value="' . Session::singleton()->get('csrf') . '">';
    }
}

if (!function_exists('isCsrfValid')) {
    /**
     * Check CSRF is valid or not.
     */
    function isCsrfValid(): bool {
        if (!Session::singleton()->has('csrf') || !isset($_POST['csrf'])) {
            return false;
        }
        if (Session::singleton()->get('csrf') != $_POST['csrf']) {
            return false;
        }
        return true;
    }
}

if (!function_exists('setMethod')) {
    /**
     * Set form method, like put/patch/delete.
     */
    function setMethod(string $methodName): string {
        return '<input type="hidden" name="_method" value="' . $methodName . '">';
    }
}

if (!function_exists('errors')) {
    /**
     * Get errors key data from form flush session.
     */
    function errors($key): mixed {
        $errors = flushMessage()->get('errors');

        if ($errors) return $errors->first($key);
        else return null;
    }
}

if (!function_exists('error')) {
    function error(): string {
        /**
         * Get error key data from form flush session
         */
        return flushMessage()->get('error');
    }
}

if (!function_exists('hasError')) {
    /**
     * Check if the error key is set to session.
     */
    function hasError(): bool {
        if (flushMessage()->has('error')) return true;
        else return false;
    }
}

if (!function_exists('success')) {
    /**
     * Get success key data from form flush session.
     */
    function success(): string {
        return flushMessage()->get('success');
    }
}

if (!function_exists('hasSuccess')) {
    /**
     * Check if the success key is set to session.
     */
    function hasSuccess(): bool {
        if (flushMessage()->has('success')) return true;
        else return false;
    }
}
