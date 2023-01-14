<?php

namespace App\Core;

class View {

    public string $title = '';

    /**
     * This view() method render and view html page in front you
     *
     * @param  string $view
     * @param  array  $params
     * @return string
     */
    public function View( string $view, array $params = [] ) {
        $viewContent   = $this->renderOnlyView( $view, $params );
        $layoutContent = $this->layoutContent();

        return str_replace( '{{content}}', $viewContent, $layoutContent );
    }

    /**
     * This method Set and include main layout name
     * then send view() method
     *
     * @return string
     */
    protected function layoutContent() {
        $layout = Application::$app->controller->layout ?? 'main';

        ob_start();
        include_once Application::$ROOT_DIR_PATH . "/views/layout/$layout.php";
        return ob_get_clean();
    }

    /**
     * This method include html content Based on user's needs
     * then send view() method
     *
     * @param string $view
     * @param array $params
     * @return string
     */
    protected function renderOnlyView( $view, $params ) {
        foreach ( $params as $key => $value ) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR_PATH . "/views/$view.php";
        return ob_get_clean();
    }

}
