<?php

namespace App\Http\Middleware;

use App\Providers\AppServiceProvider;
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
                if (!Auth::guard($guard)->check()) {
                    return redirect('/editors/login');
                }
            }
        } elseif (!Auth::check()) {
            return redirect('/login');
        }
        return;
    }

}
