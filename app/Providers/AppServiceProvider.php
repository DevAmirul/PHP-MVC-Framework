<?php

namespace App\Providers;

use Devamirul\PhpMicro\core\Foundation\Application\Container\BaseContainer\BaseContainer;

class AppServiceProvider extends BaseContainer {

    public Const HOMEPATH = '/';
    
    public Const GUESTPATH = '/login';

    public function register() {

        $this->bind('fahad', function () {
            return 'fahad container';
        });
    }

    public function boot() {

    }
}
