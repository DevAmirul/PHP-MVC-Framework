<?php

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;

if (!function_exists('request')) {
    /**
     * Get request instance.
     */
    function request(): Request {
        return Request::singleton();
    }
}