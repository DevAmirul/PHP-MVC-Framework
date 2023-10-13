<?php

provider:
$provider = (string) readline('Enter a provider name: ');

if ($provider) {
    if (file_exists('../../../../../app/Providers/' . ucfirst($provider) . 'ServiceProvider.php')) {
        echo 'error: - A file with this name already exists in the providers folder, please try another name.' . PHP_EOL;

        goto provider;
    }else{
        $resource = fopen('../../../../../app/Providers/' . ucfirst($provider) . 'ServiceProvider.php', "w")
        or die("Unable to create file!");

        fwrite($resource, getProviderTemplate(ucfirst($provider)));

        fclose($resource);

        echo 'Created Provider: ' . ucfirst($provider) . 'ServiceProvider.php' . PHP_EOL;
    }
}

function getProviderTemplate(string $providerName) : string {
    return sprintf(
    "<?php

    namespace App\Providers;

    use Devamirul\PhpMicro\core\Foundation\Application\Container\BaseContainer\BaseContainer;

    class AppServiceProvider extends BaseContainer {

        public function register() {
        }

        public function boot() {
        }
    }", $providerName . 'ServiceProvider'
    );
}