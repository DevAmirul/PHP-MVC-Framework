<?php

/**
 * Create app service Provider by CLI
 */
provider:
$provider = (string) readline('Enter a provider name: ');

if ($provider) {
    if (file_exists('../../../../../app/Providers/' . ucfirst($provider) . 'ServiceProvider.php')) {
        echo 'error: - A file with this name already exists in the providers folder, please try another name.' . PHP_EOL;

        goto provider;
    } else {
        $resource = fopen('../../../../../app/Providers/' . ucfirst($provider) . 'ServiceProvider.php', "w")
        or die("Unable to create file!");

        fwrite($resource, getProviderSkeleton(ucfirst($provider)));

        fclose($resource);

        echo 'Created Provider: ' . ucfirst($provider) . 'ServiceProvider.php' . PHP_EOL;
    }
}

/**
 * Get provider class Skeleton.
 */
function getProviderSkeleton(string $providerName): string {
    return sprintf(
        "<?php

    namespace App\Providers;

    use Devamirul\PhpMicro\core\Foundation\Application\Container\BaseContainer;
    use Devamirul\PhpMicro\core\Foundation\Application\Container\Interface\ContainerInterface;

    class AppServiceProvider extends BaseContainer implements ContainerInterface {

        /**
         * Register any application services.
         */
        public function register(): void {
            //
        }

        /**
         * Bootstrap any application services
         * and if you want to do something before handling the request.
         */
        public function boot(): void {
            //
        }

    }", $providerName . 'ServiceProvider'
    );
}