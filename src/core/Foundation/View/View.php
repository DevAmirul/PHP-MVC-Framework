<?php

namespace Devamirul\PhpMicro\core\Foundation\View;

use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;

class View {
    use Singleton;

    public string $title;

    private function __construct() {}

    /**
     * This view() method render and view html page in front you.
     */
    public function view(string $view, ?array $params = null, ?string $layout = null) {
        $viewContent   = $this->renderViewContent($view, $params);
        $layoutContent = $this->renderLayoutContent($layout, $params);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * This method Set and include main layout name, then send view() method.
     */
    protected function renderLayoutContent(?string $layout = null, ?array $params = null) {
        if ($params) {
            foreach ($params as $key => $value) {
                $$key = $value;
            }
        }

        if (!$layout) {
            $layout = 'app';
        }

        ob_start();

        include_once APP_ROOT . "/resources/views/layout/$layout.view.php";

        return ob_get_clean();
    }

    /**
     * This method include html content Based on user's needs then send view() method.
     */
    protected function renderViewContent(string $view, ?array $params = null) {
        if ($params) {
            foreach ($params as $key => $value) {
                $$key = $value;
            }
        }
        ob_start();

        include_once APP_ROOT . "/resources/views/$view.view.php";

        return ob_get_clean();
    }

    /**
     * Set the value of title.
     */
    public function setTitle($title): void {
        $this->title = $title;
    }

    /**
     * Get the value of title.
     */
    public function getTitle(): string {
        return $this->title;
    }
}
