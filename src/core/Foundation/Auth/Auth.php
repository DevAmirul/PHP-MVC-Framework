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

    public function user(): mixed {
        return Session::singleton()->has($this->guard['provider']) ? Session::singleton()->get($this->guard['provider']) : false;
    }

    public function guest(): bool {
        return Session::singleton()->has($this->guard['provider']) ? true : false;
    }

    public function check(): bool {
        return Session::singleton()->has($this->guard['provider']) ? true : false;
    }
}
