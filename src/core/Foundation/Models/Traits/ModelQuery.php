<?php

namespace Devamirul\PhpMicro\core\Foundation\Models\Traits;

trait ModelQuery {

    public function select(): static {
        $this->data = $this->db->select($this->table, ...func_get_args());
        return $this;
    }

    public function insert(): static {
        $this->data = $this->db->insert($this->table, ...func_get_args());
        return $this;
    }

    public function id(): static {
        $this->data = $this->db->insert($this->table, ...func_get_args());
        return $this;
    }

    public function update(): static {
        $this->data = $this->db->update($this->table, ...func_get_args());
        return $this;
    }

    public function delete(): static {
        $this->data = $this->db->delete($this->table, ...func_get_args());
        return $this;
    }

    public function replace(): static {
        $this->data = $this->db->replace($this->table, ...func_get_args());
        return $this;
    }

    public function get(): static {
        $this->data = $this->db->get($this->table, ...func_get_args());
        return $this;
    }

    public function has(): static {
        $this->data = $this->db->has($this->table, ...func_get_args());
        return $this;
    }

    public function rand(): static {
        $this->data = $this->db->rand($this->table, ...func_get_args());
        return $this;
    }

    public function count(): static {
        $this->data = $this->db->count($this->table, ...func_get_args());
        return $this;
    }

    public function max(): static {
        $this->data = $this->db->max($this->table, ...func_get_args());
        return $this;
    }

    public function min(): static {
        $this->data = $this->db->min($this->table, ...func_get_args());
        return $this;
    }

    public function avg(): static {
        $this->data = $this->db->avg($this->table, ...func_get_args());
        return $this;
    }

    public function sum(): static {
        $this->data = $this->db->sum($this->table, ...func_get_args());
        return $this;
    }
}
