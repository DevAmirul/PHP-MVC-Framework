<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Facade;

abstract class BaseFacade {

    abstract static protected function getFacadeAccessor(): string;

    public static function __callStatic($name, $arguments) {
        return app()->make(static::getFacadeAccessor())->$name(...$arguments);
    }
}
