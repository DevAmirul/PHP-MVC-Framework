<?php

namespace Devamirul\PhpMicro\core\Foundation\CLI\Database\Base;

class BaseMigration extends CLIBaseDatabase {

    public static function getAppliedMigrations(): array {
        return static::db()->select('migrations', ['migration']);
    }

    public static function updateMigrationsTable(array $migratedClassNames) {
        return static::db()->insert('migrations', $migratedClassNames);
    }

    public static function createMigrationsTable() {
        static::db()->create('migrations', [
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
        ], ["ENGINE" => "INNODB"]);
    }

    public static function dropTables($tableNames): string {
        static::db()->drop($tableNames);
        static::deleteMigratedTableNamesInMigrationsTable($tableNames);

        return $tableNames;
    }

    public static function deleteMigratedTableNamesInMigrationsTable($tableNames): void {
        static::db()->delete('migrations', [
            "AND" => [
                "migration"   => $tableNames,
            ]
        ]);
    }

}
