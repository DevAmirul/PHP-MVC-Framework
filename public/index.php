<?php

/**
 * @author Amirul islam <contact.amirull@gmail.com>
 * @copyright 2022 Amirul
 */


require_once __DIR__ . '/../vendor/autoload.php';

use App\Application;


$rootDriPath = dirname(__DIR__);

$app = new Application($rootDriPath);

$app->router->get( '/', 'home' );

$app->router->get( '/contact', 'contact');

$app->run();

?>