<?php

namespace Devamirul\PhpMicro\core\Foundation\View;

use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;

class View {
    use Singleton;

    /**
     * Page title.
     */
    public string $title;

    /**
     * View layout.
     */
    public string $layout = '';

    private function __construct() {}

    /**
     * Get the evaluated view content for the given view.
     */
    public function view(string $view, ?array $params = null): string {
        $viewContent   = $this->renderViewContent($view, $params);
        $layoutContent = $this->renderLayoutContent($params);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * Set response status code.
     */
    public function status(int $code): static {
        http_response_code($code);
        return $this;
    }

    /**
     * Set view layout.
     */
    public function layout(string $layout = ''): static {
        $this->layout = $layout;
        return $this;
    }

    /**
     * Include and render layout.
     */
    protected function renderLayoutContent(?array $params = null): string {
        if ($params) {
            foreach ($params as $key => $value) {
                $$key = $value;
            }
        }

        if (!$this->layout) $this->layout = 'app';

        ob_start();

        include_once APP_ROOT . "/resources/views/layout/$this->layout.view.php";

        return ob_get_clean();
    }

    /**
     * Include and render content Based on user's needs then send view() method.
     */
    protected function renderViewContent(string $view, ?array $params = null): string {
        if ($params) {
            foreach ($params as $key => $value) {
                $$key = $value;
            }
        }
        ob_start();

        include_once APP_ROOT . "/resources/views/" . $view . ".view.php";

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
