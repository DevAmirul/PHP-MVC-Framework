<?php

namespace Devamirul\PhpMicro\core\Foundation\Auth\Traits;

trait Guard {

    private array $guard;

    private function defineDefaultGuard(): void {

        $defaults = config('auth', 'defaults');

        $guards = config('auth', 'guards');

        $this->guard = $guards[$defaults];
    }

    public function guard(string $guard): static {

        $guards = config('auth', 'guards');

        $this->guard = $guards[$guard];

        return $this;
    }
}
