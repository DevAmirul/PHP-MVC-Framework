<?php

namespace App\Containers;

trait Container {

    public function registerContainer() {

        $this->bind('fahad', function () {
            return 'fahad container';
        });
    }
}
