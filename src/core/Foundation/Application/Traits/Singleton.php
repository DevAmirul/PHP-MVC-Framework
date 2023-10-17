<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Traits;

trait Singleton {

    private static $instance = null;

    public static function singleton(): Object {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    private function __clone() {}
    
}
