<?php

namespace App\Http\Middleware;

use Devamirul\PhpMicro\core\Foundation\Middleware\Interface\Middleware;

class AuthMiddleware implements Middleware {

    public function handle() {
        dd('auth middleware');
        // return;

    }
}
