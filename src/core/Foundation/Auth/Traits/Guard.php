<?php

namespace Devamirul\PhpMicro\core\Foundation\Auth\Traits;

trait Guard {

    /**
     * Store guard.
     */
    private array $guard;

    /**
     * Set default guard.
     */
    private function defineDefaultGuard(): void {
        $defaults = config('auth', 'defaults');
        $guards = config('auth', 'guards');
        $this->guard = $guards[$defaults];
    }

    /**
     * Change default guard.
     */
    public function guard(string $guard): static {
        $guards = config('auth', 'guards');
        $this->guard = $guards[$guard];
        return $this;
    }
}
