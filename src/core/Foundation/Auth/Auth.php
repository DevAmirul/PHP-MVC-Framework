<?php

namespace Devamirul\PhpMicro\core\Foundation\Auth;

use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;
use Devamirul\PhpMicro\core\Foundation\Auth\Traits\Guard;
use Devamirul\PhpMicro\core\Foundation\Session\Session;

class Auth {
    use Guard;

    public function __construct() {
        $this->defineDefaultGuard();
    }

    /**
     * Get available auth details in session.
     */
    public function user(): mixed {
        return Session::singleton()->has($this->guard['provider']) ? Session::singleton()->get($this->guard['provider']) : false;
    }

    /**
     * Check if user is authenticated or guest, return boolean.
     */
    public function guest(): bool {
        return Session::singleton()->has($this->guard['provider']) ? true : false;
    }

    /**
     * Check if the user is authenticated, return boolean.
     */
    public function check(): bool {
        return Session::singleton()->has($this->guard['provider']) ? true : false;
    }
}
