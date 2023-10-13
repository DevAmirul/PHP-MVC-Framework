<?php

namespace Devamirul\PhpMicro\core\Foundation\CLI\Database\Base;

use Dotenv\Dotenv;
use Medoo\Medoo;

class CLIBaseDatabase {

    public static function db(): Medoo {
        $dotenv = Dotenv::createImmutable('../../../../../');
        $dotenv->safeLoad();

        return new Medoo([
            'type'     => $_ENV['DB_CONNECTION'],
            'host'     => $_ENV['DB_HOST'],
            'port'     => $_ENV['DB_PORT'],
            'database' => $_ENV['DB_DATABASE'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'error'    => $_ENV['DB_ERROR'],
            "logging"  => true,
        ]);
    }
}
