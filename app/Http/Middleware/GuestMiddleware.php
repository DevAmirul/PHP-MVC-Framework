<?php

namespace App\Http\Middleware;

use App\Providers\AppServiceProvider;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Auth;
use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Middleware\Interface\Middleware;

class GuestMiddleware implements Middleware {

    public function handle(Request $request, array $guards) {

        if (!empty($guards)) {
            foreach ($guards as $guard) {
                if (Auth::guard($guard)->check()) {
                    return redirect(AppServiceProvider::HOMEPATH);
                }
            }
        }elseif (Auth::check()) {
            return redirect(AppServiceProvider::HOMEPATH);
        }
        
        return;

    }
}
