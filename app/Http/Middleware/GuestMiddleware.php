<?php

namespace App\Http\Middleware;

use Devamirul\PhpMicro\core\Foundation\Middleware\Interface\Middleware;

class GuestMiddleware implements Middleware {

    public function handle() {
        // return throw new \Exception('guest no allow..............');
        return ;
    }
}
