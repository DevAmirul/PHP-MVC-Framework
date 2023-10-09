<?php

use Devamirul\PhpMicro\core\Foundation\Database\CLI\BaseMigration;

require_once '../../../../../vendor/autoload.php';

// $confirmation = (string) readline('Are you sure? (y/n) ');

$db = BaseMigration::db();

// var_dump(BaseMigration::getAppliedMigrations());

if (!BaseMigration::getAppliedMigrations()) {
    try {
        BaseMigration::createMigrationsTable();
    } catch (\PDOException $th) {
        echo $th;
        die();
    }
}

$appliedMigrations = BaseMigration::getAppliedMigrations();

if (!$appliedMigrations) {

    $filesOfMigrationFolder = scandir('../../../../../database/migrations');

    echo $filesOfMigrationFolder;

}
