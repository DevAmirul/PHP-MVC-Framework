<?php

namespace Devamirul\PhpMicro\core\Foundation\Database;

use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;
use Medoo\Medoo;

class BaseDatabase {
    use Singleton;

    private function __construct() {}

    public function db(): Medoo {
        $dbDefault = config('database', 'default');

        $dbConnectionConfig = config('database', 'connections');

        return new Medoo([
            'type'     => $dbConnectionConfig[$dbDefault]['driver'],
            'host'     => $dbConnectionConfig[$dbDefault]['host'],
            'port'     => $dbConnectionConfig[$dbDefault]['port'],
            'database' => $dbConnectionConfig[$dbDefault]['database'],
            'username' => $dbConnectionConfig[$dbDefault]['username'],
            'password' => $dbConnectionConfig[$dbDefault]['password'],
            'error'    => $dbConnectionConfig[$dbDefault]['error'],
            "logging"  => true,
        ]);
    }
}
