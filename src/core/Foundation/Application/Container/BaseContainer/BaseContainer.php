<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Container\BaseContainer;

use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;

class BaseContainer {

    private static array $bindings = [];

    public function bind(string $name, callable $resolver): void {
        static::$bindings[$name] = $resolver;
    }

    public function make(string $name): mixed {
        return static::$bindings[$name]();
    }

    public function getBindings(): mixed {
        return static::$bindings;
    }
}
