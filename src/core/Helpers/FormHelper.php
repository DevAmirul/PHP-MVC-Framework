<?php

if (!function_exists('setCsrf')) {
    function setCsrf(): string {
        if (!session()->has('csrf')) {
            session()->set('csrf', bin2hex(random_bytes(50)));
        }
        return '<input type="hidden" name="csrf" value="' . session()->get('csrf') . '">';
    }
}

if (!function_exists('isCsrfValid')) {
    function isCsrfValid() {
        if (!session()->has('csrf') || !isset($_POST['csrf'])) {
            return false;
        }
        if (session()->get('csrf') != $_POST['csrf']) {
            return false;
        }
        return true;
    }
}

if (!function_exists('formStart')) {
    function formStart(string $action, string $method, string $classes = '') {
        return sprintf(
            '<form action="%s" method="%s" class="%s">',
            $action, $method, $classes
        );
    }
}

if (!function_exists('formEnd')) {
    function formEnd() {
        return '</form>';
    }
}

if (!function_exists('setMethod')) {
    function setMethod(string $methodName) {
        return '<input type="hidden" name="_method" value="' . $methodName . '">';
    }
}

if (!function_exists('url')) {
    function url(string $path = null) {
        return APP_ROOT . $path;
    }
}
