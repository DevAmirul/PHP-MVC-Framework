<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\DateTime;

use ICanBoogie\DateTime;

class Time {

    /**
     * Get DateTime instance 
     */
    public function time(): DateTime {
        date_default_timezone_set('EST');

        return new DateTime('now', config('app', 'timezone'));
    }

}
