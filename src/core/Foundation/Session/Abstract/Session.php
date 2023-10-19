<?php

namespace Devamirul\PhpMicro\core\Foundation\Session\Abstract;

abstract class Session {

    /**
     * Session start.
     */
    protected function __construct() {
        session_start();
    }

    /**
     * Set data in session.
     */
    public function set(string $key, mixed $data): void {}

    /**
     * Get data from the session.
     */
    public function get(string $key): mixed {}

    /**
     * Delete data from session.
     */
    public function delete(string $key): void {}

}
