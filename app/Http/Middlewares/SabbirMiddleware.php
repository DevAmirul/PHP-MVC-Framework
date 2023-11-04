<?php

    namespace App\Http\Middlewares;

    use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
    use Devamirul\PhpMicro\core\Foundation\Middleware\Interface\Middleware;

    class SabbirMiddleware implements Middleware {

        /**
         * Check if the request is authenticated and act accordingly.
         */
        public function handle(Request $request, array $guards): void {
            //
        }

    }
    