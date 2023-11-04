<?php

/**
 * Create app service Provider by CLI
 */
middleware:

$middleware = (string) readline('Enter a controller name: ');

/**
 * Check if there is already a file with this controller name.
 */
if ($middleware) {
    if (file_exists('../../../../../app/Http/Middlewares/' . ucfirst($middleware) . 'Middleware.php')) {
        echo 'error: - A file with this name already exists in the controllers folder, please try another name.' . PHP_EOL;

        goto middleware;
    } else {
        $resource = fopen('../../../../../app/Http/Middlewares/' . ucfirst($middleware) . 'Middleware.php', "w")
        or die("Unable to create file!");

        fwrite($resource, getMiddlewareSkeleton(ucfirst($middleware)));

        fclose($resource);

        echo 'Created Controller: ' . ucfirst($middleware) . 'Middleware.php' . PHP_EOL;
    }
}

/**
 * Get controller class skeleton.
 */
function getMiddlewareSkeleton(string $MiddlewareName): string {
    return sprintf(
    "<?php

    namespace App\Http\Middlewares;

    use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
    use Devamirul\PhpMicro\core\Foundation\Middleware\Interface\Middleware;

    class %sMiddleware implements Middleware {

        /**
         * Check if the request is authenticated and act accordingly.
         */
        public function handle(Request \$request, array \$guards): void {
            //
        }

    }
    ", $MiddlewareName);
}