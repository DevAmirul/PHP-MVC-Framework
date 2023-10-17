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
        if (!Auth::check()) {
            return redirect(AppServiceProvider::GUESTPATH);
        }
        return;
    }
    
}
