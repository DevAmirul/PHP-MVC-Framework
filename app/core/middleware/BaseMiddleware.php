<?php

namespace App\Core\Middleware;

use App\Core\Application;

class BaseMiddleware {

    public function execute()
    {
        if (Application::$app->isGuest()) {

        }
    }
}