<?php

namespace App;

use App\Middleware\AuthMiddleware;


class RegisterMiddleware {

    /**
     * Here register All custom & default middleware.
     * @return array
     */
    public function registerMiddleware() {
        return [
            new AuthMiddleware( ['profile'] ), //default middleware
        ];
    }
}
