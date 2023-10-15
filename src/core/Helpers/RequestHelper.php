<?php

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;

if (!function_exists('request')) {
    function request() {
        return Request::singleton();
    }
}