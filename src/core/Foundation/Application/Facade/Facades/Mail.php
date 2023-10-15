<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades;

use Devamirul\PhpMicro\core\Foundation\Application\Facade\BaseFacade;

class Mail extends BaseFacade {
    protected static function getFacadeAccessor(): string {
        return 'Mail';
    }
}
