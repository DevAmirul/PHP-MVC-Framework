<?php

namespace App\Containers;

use Devamirul\PhpMicro\core\Foundation\Application\Container\BaseContainer\BaseContainer;

class Container extends BaseContainer {

    public function register() {

        $this->bind('fahad', function () {
            return 'fahad container';
        });
    }
}
