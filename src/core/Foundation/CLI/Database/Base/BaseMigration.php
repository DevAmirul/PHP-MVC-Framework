<?php

namespace Devamirul\PhpMicro\core\Foundation\CLI\Database\Base;

class BaseMigration extends CLIBaseDatabase {

    /**
     * Get applied migrations from db.
     */
    public static function getAppliedMigrations(): array {
        return static::db()->select('migrations', ['migration']);
    }

    /**
     * update migrations table.
     */
    public static function updateMigrationsTable(array $migratedClassNames) {
        return static::db()->insert('migrations', $migratedClassNames);
    }

    /**
     * Migrations Table create sql query.
     */
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

    /**
     * Drop applied migration table from DB.
     */
    public static function dropTables($tableNames): string {
        static::db()->drop($tableNames);
        static::deleteMigratedTableNamesInMigrationsTable($tableNames);

        return $tableNames;
    }

    /**
     * Delete specific Table Names In Migrations Table.
     */
    public static function deleteMigratedTableNamesInMigrationsTable($tableNames): void {
        static::db()->delete('migrations', [
            "AND" => [
                "migration" => $tableNames,
            ],
        ]);
    }

}
