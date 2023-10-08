<?php

define('APP_ROOT', dirname(__DIR__));


$table = (string) readline('Enter a table name: ');

if ($table) {
    if (file_exists(APP_ROOT . '/database/migrations/' . $table . '_table.php')) {
        echo 'error: - A file with this name already exists in the migrations folder, please try another name.';
    } else {
        $resource = fopen(APP_ROOT . '/database/migrations/' . $table . '_table.php', "w")
        or die("Unable to create file!");

        fwrite($resource, getMigrationTemplate($table . '_table', $table));

        fclose($resource);

        echo 'Created Table- ' . $table . '_table.php';
    }
}


model:

$model = (string) readline('Want to create a model (yes/no): ');

if ($model == 'yes') {

    if (file_exists(APP_ROOT . '/app/Models/' . ucfirst($table) . '.php')) {
        echo 'error: - A file with this name already exists in the models folder, please try another name.';
    } else {
        $resource = fopen(APP_ROOT . '/app/Models/' . ucfirst($table) . '.php', "w")
            or die("Unable to create file!");

        fwrite($resource, getModelTemplate(ucfirst($table)));

        fclose($resource);

        echo 'Created Model- ' . ucfirst($table) . '.php' . PHP_EOL;
    }

}elseif ($model !== 'no') {
    goto model;
}


controller:

$controller = (string) readline('Want to create a Controller (yes/no): ');

if ($controller == 'yes') {

    if (file_exists(APP_ROOT . '/app/Http/Controllers/' . ucfirst($table) . 'Controller.php')) {
        echo 'error: - A file with this name already exists in the controllers folder, please try another name.';
    } else {
        $resource = fopen(APP_ROOT . '/app/Http/Controllers/' . ucfirst($table) . 'Controller.php', "w")
        or die("Unable to create file!");

        fwrite($resource, getControllerTemplate(ucfirst($table)));

        fclose($resource);

        echo 'Created Controller- ' . ucfirst($table) . 'Controller.php';
    }

}elseif ($controller !== 'no') {
    goto controller;
}


function getMigrationTemplate(string $className, string $tableName): string {
    return sprintf(
"<?php

class %s {

    /**
     * This up()**************-ase class.####***######**
     */
    public function up() {

        database->create('%s', [
            'id' => [
                'INT',
                'NOT NULL',
                'AUTO_INCREMENT',
                'PRIMARY KEY',
            ],
            'name' => [
                'VARCHAR(30)',
                'NOT NULL',
            ],
        ]);
    }
}", $className, $tableName );
}


function getModelTemplate(string $model): string {
    return sprintf(
"<?php

namespace App\Models;

use Devamirul\PhpMicro\core\Foundation\Models\BaseModel;

class %s extends BaseModel {

}", $model );
}


function getControllerTemplate(string $controller): string {
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

}", $controller );
}