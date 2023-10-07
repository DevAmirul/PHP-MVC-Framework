<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades;

use Devamirul\PhpMicro\core\Foundation\Application\Facade\BaseFacade;

class Request extends BaseFacade {
    protected static function getFacadeAccessor(): string {
        return 'Request';
    }
}
