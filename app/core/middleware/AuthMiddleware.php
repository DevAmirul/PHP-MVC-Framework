<?php

namespace App\Core\Middleware;

use App\Core\Application;
use App\Core\Exception\ForbiddenException;

class AuthMiddleware extends BaseMiddleware {

    public array $actions = [];

    public function __construct( array $actions = [] ) {
        $this->actions = $actions;
    }

    public function execute() {
        if ( Application::$app->isGuest() ) {
            if (  in_array( Application::$app->controller->action, $this->actions ) ) {
                throw new ForbiddenException();
            }
        }
    }
}
