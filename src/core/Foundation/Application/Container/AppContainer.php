<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Container;

class AppContainer {

    /**
     * The container's bindings.
     */
    private static array $bindings = [];


    /**
     * This method helps to bind the container.
     */
    public function bind(string $name, callable $resolver): void {
        static::$bindings[$name] = $resolver;
    }

    /**
     * Resolve specific Container by key.
     */
    public function make(string $name): mixed {
        return static::$bindings[$name]();
    }

    /**
     * Get all container list.
     */
    public function getBindings(): mixed {
        return static::$bindings;
    }
    
}