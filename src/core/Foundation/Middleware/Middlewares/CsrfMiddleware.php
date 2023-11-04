<?php

namespace Devamirul\PhpMicro\core\Foundation\Middleware\Middlewares;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Exceptions\CsrfNotFoundException;
use Devamirul\PhpMicro\core\Foundation\Middleware\Interface\Middleware;

class CsrfMiddleware implements Middleware {

    /**
     * CSRF token will be checked. Exception will be thrown if not found
     */
    public function handle(Request $request, array $guards): void {
        if (in_array($request->method(), ['post', 'delete', 'put', 'patch'])) {
            if (!isCsrfValid()) {
                throw new CsrfNotFoundException();
            }
            return;
        }
    }

}
