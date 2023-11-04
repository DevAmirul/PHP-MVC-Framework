<?php

namespace App\Http\Middlewares;

use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Auth;
use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Middleware\Interface\Middleware;
use Exception;

class AuthMiddleware implements Middleware {

    /**
     * Check if the request is authenticated and act accordingly.
     */
    public function handle(Request $request, array $guards): void {
        if (!empty($guards)) {
            foreach ($guards as $guard) {
                if ($guard === 'admin' && Auth::guard($guard)->check()) {
                    return redirect('/admin/login');
                }
            }
        } elseif (!Auth::check()) {
            return redirect('/login');
        }
        throw new Exception("Error Processing Request", 1);

        return;
    }

}
