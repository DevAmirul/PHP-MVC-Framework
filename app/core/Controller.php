<?php

namespace App\Core;

use App\Core\Application;

class Controller {

    public String $layout = 'main';
    public function setLayout($layout) {
        $this->layout = $layout;
    }

    protected function view( $view, $params = [] ) {
        return Application::$app->router->view( $view, $params );
    }
}