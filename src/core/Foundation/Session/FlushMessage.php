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

    public function set(string $key, mixed $data): void {
        $_SESSION['flush'][$key] = [
            'remove' => false,
            'data'   => $data,
        ];

    }

    public function get(string $key): mixed {
        return $_SESSION['flush'][$key]['data'] ?? null;
    }

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
