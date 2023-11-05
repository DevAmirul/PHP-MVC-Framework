<?php

namespace App\Http\Middlewares;

use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Auth;
use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Middleware\Interface\Middleware;

class AuthMiddleware implements Middleware {

    /**
     * Check if the request is authenticated and act accordingly.
     */
    public function handle(Request $request, array $guards) {
        if (!empty($guards)) {
            foreach ($guards as $guard) {
                if ($guard === 'editor' && Auth::guard($guard)->check()) {
                    return;
                }
                return redirect('/editors/login');
            }
        } elseif (!Auth::check()) {
            return redirect('/login');
        }
        return;
    }

}
