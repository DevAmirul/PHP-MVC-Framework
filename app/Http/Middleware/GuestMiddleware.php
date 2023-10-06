<?php

namespace App\Http\Middleware;

use Devamirul\PhpMicro\core\Foundation\Middleware\MiddlewareInterface;

class GuestMiddleware implements MiddlewareInterface {

    public function handle() {
        return throw new \Exception('guest..............');
        // return ;
    }
}
