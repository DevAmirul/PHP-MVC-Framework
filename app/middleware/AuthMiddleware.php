<?php

namespace App\Middleware;

use App\Core\Application;
use App\Core\BaseMiddleware;
use App\Core\Exception\ForbiddenException;

class AuthMiddleware extends BaseMiddleware {

    public array $actions = [];

    public function __construct( array $actions = [] ) {
        $this->actions = $actions;
    }

    /**
     * this method execute middleware and throw new error.
     *
     * @return error object
     */
    public function execute() {
        if ( Application::$app->isGuest() ) {
            if ( in_array( Application::$app->controller->action, $this->actions ) ) {
                throw new ForbiddenException();
            }
        }
    }
}
