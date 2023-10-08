<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades;

use Devamirul\PhpMicro\core\Foundation\Application\Facade\BaseFacade;

class DB extends BaseFacade{
    protected static function getFacadeAccessor(): string {
        return 'DB';
    }
}
