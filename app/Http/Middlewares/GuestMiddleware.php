<?php

namespace App\Http\Middlewares;

use App\Providers\AppServiceProvider;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Auth;
use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Middleware\Interface\Middleware;

class GuestMiddleware implements Middleware {

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, array $guards): void {
        if (!empty($guards)) {
            foreach ($guards as $guard) {
                if ($guard === 'admin' && Auth::guard($guard)->check()) {
                    return redirect('/editors/home');
                }
            }
        }elseif (Auth::check()) {
            return redirect('/');
        }
        return;
    }

}
