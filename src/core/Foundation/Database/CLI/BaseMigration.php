<?php

namespace Devamirul\PhpMicro\core\Foundation\Database\CLI;

use PDOStatement;

class BaseMigration extends CLIBaseDatabase {

    public static function getAppliedMigrations(): array | bool {

        return static::db()->get('migrations', 'table');

    }

    public static function createMigrationsTable(): PDOStatement {
        return static::db()->create('migrations', [
            "id"         => [
                "INT",
                "NOT NULL",
                "AUTO_INCREMENT",
                "PRIMARY KEY",
            ],
            "migration"  => [
                "VARCHAR(255)",
                "NOT NULL",
            ],
            "created_at" => [
                "TIMESTAMP",
                "NOT NULL",
                "DEFAULT",
                "CURRENT_TIMESTAMP",
            ],
        ], [ "ENGINE" => "INNODB" ]);
    }

}
