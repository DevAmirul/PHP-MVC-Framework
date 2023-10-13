<?php

controller:
$controller = (string) readline('Enter a controller name: ');

if ($controller) {
    if (file_exists('../../../../../app/Http/Controllers/' . ucfirst($controller) . 'Controller.php')) {
        echo 'error: - A file with this name already exists in the controllers folder, please try another name.' . PHP_EOL;

        goto controller;
    } else {
        $resource = fopen('../../../../../app/Http/Controllers/' . ucfirst($controller) . 'Controller.php', "w")
        or die("Unable to create file!");

        fwrite($resource, getControllerTemplate(ucfirst($controller)));

        fclose($resource);

        echo 'Created Controller: ' . ucfirst($controller) . 'Controller.php' . PHP_EOL;
    }
}

function getControllerTemplate(string $controllerName): string {
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