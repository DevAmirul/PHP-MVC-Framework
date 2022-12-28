<?php

namespace App\Core;

use App\Core\Application;

class Controller {

    protected function viewRender( $view, $params = [] ) {
        return Application::$app->router->view( $view, $params );
    }
}