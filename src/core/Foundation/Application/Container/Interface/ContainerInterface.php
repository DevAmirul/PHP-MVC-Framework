<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Container\Interface;

interface ContainerInterface {

    /**
     * Register any application services.
     */
    public function register(): void;

    /**
     * Bootstrap any application services
     * and if you want to do something before handling the request.
     */
    public function boot(): void;

}
