<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades;

use Devamirul\PhpMicro\core\Foundation\Application\Facade\BaseFacade;

class Session extends BaseFacade {
    
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string {
        return 'Session';
    }

}
