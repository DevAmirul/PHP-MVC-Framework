<?php

namespace Devamirul\PhpMicro\core\Foundation\Session;

use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;
use Devamirul\PhpMicro\core\Foundation\Session\Abstract\Session as AbstractSession;

class Session extends AbstractSession{
    use Singleton;

    private function __construct() {
        parent::__construct();
    }

    public function set(string $key, mixed $data): void {
        $_SESSION[$key] = $data;
    }

    public function get(string $key): mixed {
        return $_SESSION[$key] ?? null;
    }

    public function delete(string $key): void {
        unset($_SESSION[$key]);
    }
}
