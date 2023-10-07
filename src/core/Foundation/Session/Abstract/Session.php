<?php

namespace Devamirul\PhpMicro\core\Foundation\Session\Abstract;

abstract class Session {

    public function __construct(){
        session_start();
    }

    public function set(string $key, mixed $data): void{}

    public function get(string $key): mixed{}

    public function delete (string $key): void{}
}
