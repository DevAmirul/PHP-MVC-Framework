<?php

namespace App\Core;

class Session {

    public static string $FLASH_KEY = 'flash message';

    public function __construct() {
        session_start();
    }

    public function setFlash( $key, $message ) {
        $_SESSION[self::$FLASH_KEY][$key] = $massage;
    }

    public function getFlush( $key ) {

    }

    public function __destruct(){

    }
}