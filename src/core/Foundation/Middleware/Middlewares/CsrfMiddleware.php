<?php

namespace Devamirul\PhpMicro\core\Foundation\Middleware\Middlewares;

use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Request;
use Devamirul\PhpMicro\core\Foundation\Exceptions\CsrfNotFoundException;
use Devamirul\PhpMicro\core\Foundation\Middleware\Interface\Middleware;

class CsrfMiddleware implements Middleware {

    public function handle() {
        if (Request::method() === 'post') {
            if (!isCsrfValid()) {
                throw new CsrfNotFoundException();
            }
            return;
        }
    }

}
