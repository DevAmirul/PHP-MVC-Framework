<?php

namespace App\Containers;

use Devamirul\PhpMicro\core\Foundation\Application\Container\BaseContainer;

class ContainerTrait extends BaseContainer {

    public function register() {

        $this->bind('fahad', function () {
            return 'fahad container';
        });
    }
}
