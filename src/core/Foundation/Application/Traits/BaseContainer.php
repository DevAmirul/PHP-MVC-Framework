<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Traits;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;

trait BaseContainer {
    private array $bindings = [];
    
    public function bind(string $name, callable $resolver): void {
        $this->bindings[$name] = $resolver;
    }

    public function make(string $name): mixed {
        return $this->bindings[$name]();
    }

    public function getBindings(): mixed {
        return $this->bindings;
    }
}
