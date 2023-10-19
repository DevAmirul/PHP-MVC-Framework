<?php

/**
 * Drop all migrated table.
 */
require_once '../../../../../vendor/autoload.php';

use Devamirul\PhpMicro\core\Foundation\CLI\Database\Base\BaseMigration;


$confirmation = (string) readline('Are you sure? (y/n) ');

if ($confirmation == 'y') {
    $db = BaseMigration::db();

    if (sizeof(BaseMigration::getAppliedMigrations()) === 0) {
        echo 'No table found in database' . PHP_EOL;
    } else {
        $appliedMigrations = BaseMigration::getAppliedMigrations();

        $flattened_array = [];

        array_walk_recursive($appliedMigrations, function ($array) use (&$flattened_array) {
            $flattened_array[] = $array;
        });

        $appliedMigrations = $flattened_array;

        foreach ($appliedMigrations as $name) {
            echo BaseMigration::dropTables($name) . PHP_EOL;
        }
    }

}
