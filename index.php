<?php

/**
 * @author Amirul islam <contact.amirull@gmail.com>
 * @copyright 2022 Amirul
 */

require_once __DIR__ . '/vendor/autoload.php';

use App\Application;


$app = new Application();

$app->router->get( '/', function () {
    return 'hello';
} );

$app->run();

?>