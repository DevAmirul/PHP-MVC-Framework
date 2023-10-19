<?php

/**
 * Get table name from CLI
 */
table:
$table = (string) readline('Enter a table name: ');

$isFile = false;

/**
 * Check if there is already a file with this table name.
 */
if ($table) {
    if (file_exists('../../../../../database/migrations' . $table . '_table.php')) {
        echo 'error: - A file with this name already exists in the migrations folder, please try another name.' . PHP_EOL;

        $isFile = true;

        goto table;
    }
}

/**
 * Check if there is already a file with this model name.
 */
model:
$model = (string) readline('Want to create a model (y/n): ');

if ($model == 'y') {

    if (file_exists('../../../../../app/Models/' . ucfirst($table) . '.php')) {
        echo 'error: - A file with this name already exists in the models folder, please try another name.' . PHP_EOL;

        $isFile = true;

        goto table;
    }

} elseif ($model !== 'n') {
    goto model;
}

/**
 * Check if there is already a file with this controller name.
 */
controller:
$controller = (string) readline('Want to create a Controller (y/n): ');

if ($controller == 'y') {

    if (file_exists('../../../../../app/Http/Controllers/' . ucfirst($table) . 'Controller.php')) {
        echo 'error: - A file with this name already exists in the controllers folder, please try another name.' . PHP_EOL;
        $isFile = true;

        goto table;

    }
} elseif ($controller !== 'n') {
    goto controller;
}

if (!$isFile) {

    /**
     * A table will be created with the name given by the user.
     */
    if ($table) {
        $resource = fopen('../../../../../database/migrations/' . $table . '_table.php', "w")
        or die("Unable to create file!");

        fwrite($resource, getMigrationSkeleton($table . '_table', $table));

        fclose($resource);

        echo 'Created Table: ' . $table . '_table.php' . PHP_EOL;
    }

    /**
     * If the user presses y, a model will be created based on the table name.
     */
    if ($model == 'y') {
        $resource = fopen('../../../../../app/Models/' . ucfirst($table) . '.php', "w")
        or die("Unable to create file!");

        fwrite($resource, getModelSkeleton(ucfirst($table)));

        fclose($resource);

        echo 'Created Model: ' . ucfirst($table) . '.php' . PHP_EOL;
    }

    /**
     * If the user presses y, a controller will be created based on the table name.
     */
    if ($controller == 'y') {
        $resource = fopen('../../../../../app/Http/Controllers/' . ucfirst($table) . 'Controller.php', "w")
        or die("Unable to create file!");

        fwrite($resource, getControllerSkeleton(ucfirst($table)));

        fclose($resource);

        echo 'Created Controller: ' . ucfirst($table) . 'Controller.php' . PHP_EOL;
    }

}

/**
 * Get table class skeleton.
 */
function getMigrationSkeleton(string $className, string $tableName): string {
    return sprintf(
        "<?php

use Devamirul\PhpMicro\core\Foundation\CLI\Database\Base\BaseMigration;

class %s extends BaseMigration{

    /**
     * Run the migrations.
     */
    public function up() {
        return static::db()->create('%s', [
            'id' => [
                'INT',
                'NOT NULL',
                'AUTO_INCREMENT',
                'PRIMARY KEY',
            ],
            'created_at' => [
                'TIMESTAMP',
                'NOT NULL',
                'DEFAULT',
                'CURRENT_TIMESTAMP'
            ],
            'updated_at' => [
                'TIMESTAMP',
                'NOT NULL',
                'DEFAULT',
                'NOW()',
                'ON UPDATE NOW()'
            ],
        ]);
    }
}", $className, $tableName);
}

/**
 * Get model class skeleton.
 */
function getModelSkeleton(string $modelName): string {
    return sprintf(
        "<?php

namespace App\Models;

use Devamirul\PhpMicro\core\Foundation\Models\BaseModel;

class %s extends BaseModel {

}", $modelName);
}

/**
 * Get controller class skeleton.
 */
function getControllerSkeleton(string $controllerName): string {
    return sprintf(
        "<?php

namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;

class %sController extends BaseController {

    /**
     * Dummy method
     */
    public function index(Request \$request){

    }

}", $controllerName);
}