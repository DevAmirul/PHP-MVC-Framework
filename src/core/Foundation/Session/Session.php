<?php

namespace Devamirul\PhpMicro\core\Foundation\Session;

use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;
use Devamirul\PhpMicro\core\Foundation\Session\Abstract\Session as AbstractSession;

class Session extends AbstractSession{
    use Singleton;

    public function set(string $key, mixed $data): void {
        $_SESSION[$key] = $data;
    }

    public function get(string $key): mixed {
        return $_SESSION[$key] ?? null;
    }

    public function delete(string $key): void {
        unset($_SESSION[$key]);
    }

    public function has(string $key): bool {
        if (isset($_SESSION[$key])) return true;

        else return false;
    }
}
