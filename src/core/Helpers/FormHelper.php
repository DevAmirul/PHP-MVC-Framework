<?php

use Devamirul\PhpMicro\core\Foundation\Session\Session;

if (!function_exists('setCsrf')) {
    function setCsrf(): string {
        if (!Session::singleton()->has('csrf')) {
            Session::singleton()->set('csrf', bin2hex(random_bytes(50)));
        }
        return '<input type="hidden" name="csrf" value="' . Session::singleton()->get('csrf') . '">';
    }
}

if (!function_exists('isCsrfValid')) {
    function isCsrfValid() {
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
    function setMethod(string $methodName) {
        echo '<input type="hidden" name="_method" value="' . $methodName . '">';
    }
}

if (!function_exists('errors')) {
    function errors($key) {
        $errors = flushMessage()->get('errors');

        if ($errors) {
            return $errors->first($key);
        }

    }
}

if (!function_exists('error')) {
    function error() {
        if (flushMessage()->has('error')) {
            return flushMessage()->get('error');
        }
    }
}

if (!function_exists('hasError')) {
    function hasError() {
        if (flushMessage()->has('error')) {
            return true;
        }

    }
}
