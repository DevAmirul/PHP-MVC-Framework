<?php

namespace App\Core;

class Response {

    public function setHttpStatusCode(int $code)
    {
        http_response_code($code);
    }
}