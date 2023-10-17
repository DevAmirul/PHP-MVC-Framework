<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Container\Interfaces;

interface ContainerInterfaces {

    public function register(): void;

    public function boot(): void;
}
