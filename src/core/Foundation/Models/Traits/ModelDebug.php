<?php

namespace Devamirul\PhpMicro\core\Foundation\Models\Traits;

trait ModelDebug {
    public function debug(): static {
        $this->db->debug();
        return $this;
    }

    public function beginDebug(): static {
        $this->db->beginDebug();
        return $this;
    }

    public function debugLog(): array {
        return $this->db->debugLog();
    }

    public function log(): array {
        return $this->db->log();
    }

    public function last(): string {
        return $this->db->last();
    }

    public function error(): string|null {
        return $this->db->error;
    }

    public function errorInfo(): array|null {
        return $this->db->errorInfo;
    }

    public function action(callable $function): string {
        $this->db->action($function);
        return $this;
    }
}
