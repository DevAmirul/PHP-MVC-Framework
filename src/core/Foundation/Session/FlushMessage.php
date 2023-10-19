<?php

namespace Devamirul\PhpMicro\core\Foundation\Session;

use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;
use Devamirul\PhpMicro\core\Foundation\Session\Abstract\Session as AbstractSession;

class FlushMessage extends AbstractSession {
    use Singleton;

    private function __construct() {
        if (isset($_SESSION['flush'])) {
            foreach ($_SESSION['flush'] as $key => $flashMessage) {
                $_SESSION['flush'][$key]['remove'] = true;
            }
        }
    }

    /**
     * Set data in flush session.
     */
    public function set(string $key, mixed $data): void {
        $_SESSION['flush'][$key] = [
            'remove' => false,
            'data'   => $data,
        ];

    }

    /**
     * Get data from the flush session.
     */
    public function get(string $key): mixed {
        return $_SESSION['flush'][$key]['data'] ?? null;
    }

    /**
     * Check if the data exists.
     */
    public function has(string $key): bool {
        if (isset($_SESSION['flush'][$key])) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Delete data from flush session.
     */
    private function destroyFlushSession(): void {
        if (isset($_SESSION['flush'])) {
            foreach ($_SESSION['flush'] as $key => $flash) {
                if ($_SESSION['flush'][$key]['remove']) {
                    unset($_SESSION['flush'][$key]);
                }
            }
        }
    }

    public function __destruct() {
        $this->destroyFlushSession();
    }
}
