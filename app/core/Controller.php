<?php

namespace App\Core;

use App\Core\Application;

class Controller {

    public String $layout = 'main';

    /**
     * Set html layout file name in this function
     *
     * @param string $layout
     * @return void
     */
    public function setLayout( string $layout ) {
        $this->layout = $layout;
    }

    /**
     * Controller view function
     *
     * @param string $view
     * @param array $params
     * @return string
     */
    protected function view( string $view, array $params = [] ) {
        return Application::$app->router->view( $view, $params );
    }
}