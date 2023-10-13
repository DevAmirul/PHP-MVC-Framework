<?php

require_once '../../../../../vendor/autoload.php';

use Devamirul\PhpMicro\core\Foundation\CLI\Database\Base\BaseMigration;


$confirmation = (string) readline('Are you sure? (y/n) ');

$migratedClassNames = [];

if ($confirmation === 'y') {
    $db = BaseMigration::db();

    if (sizeof(BaseMigration::getAppliedMigrations()) === 0) {
        BaseMigration::createMigrationsTable();
    }

    $appliedMigrations = BaseMigration::getAppliedMigrations();

    $flattened_array = [];

    array_walk_recursive($appliedMigrations, function ($array) use (&$flattened_array) {
        $flattened_array[] = $array . '_table.php';
    });

    $appliedMigrations = $flattened_array;

    if (sizeof($appliedMigrations) == 0) {
        $migratedClassNames = [];

        $unMigratedFiles = scandir('../../../../../database/migrations');

        migrateTables($unMigratedFiles);

    } else {
        $filesOfMigrationsFolder = scandir('../../../../../database/migrations');

        $unMigratedFiles = array_diff($filesOfMigrationsFolder, $appliedMigrations);

        migrateTables($unMigratedFiles);
    }
}

function migrateTables($unMigratedFiles) {
    $migratedClassNames = [];

    foreach ($unMigratedFiles as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }
        require_once '../../../../../database/migrations/' . $file;

        $className = pathinfo($file, PATHINFO_FILENAME);

        $classInstance = (new $className())->up();

        if ($classInstance) {
            echo 'Created table:- ' . substr($className, 0, -6) . PHP_EOL;
            $migratedClassNames[] = ['migration' => substr($className, 0, -6)];
        }
    }
    if ($migratedClassNames) {
        BaseMigration::updateMigrationsTable($migratedClassNames);
    } else {
        echo 'All tables are migrated' . PHP_EOL;
    }
}
