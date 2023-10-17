<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Facade;

abstract class BaseFacade {

    /**
     * Get the registered name of the component.
     */
    abstract static protected function getFacadeAccessor(): string;

    /**
     * Handle dynamic, static calls to the object.
     */
    public static function __callStatic($name, $arguments) {
        return app()->make(static::getFacadeAccessor())->$name(...$arguments);
    }
}
