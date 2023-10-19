<?php

namespace Devamirul\PhpMicro\core\Foundation\Session;

use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;
use Devamirul\PhpMicro\core\Foundation\Session\Abstract\Session as AbstractSession;

class Session extends AbstractSession {
    use Singleton;

    /**
     * Set data in session.
     */
    public function set(string $key, mixed $data): void {
        $_SESSION[$key] = $data;
    }

    /**
     * Get data from the session.
     */
    public function get(string $key): mixed {
        return $_SESSION[$key] ?? null;
    }

    /**
     * Delete data from session.
     */
    public function delete(string $key): void {
        unset($_SESSION[$key]);
    }

    /**
     * Check if the data exists.
     */
    public function has(string $key): bool {
        if (isset($_SESSION[$key])) {
            return true;
        } else {
            return false;
        }
    }
}
