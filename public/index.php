<?php

/**
 * @author Amirul islam <contact.amirull@gmail.com>
 * @copyright 2022 Amirul
 */

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\SiteController;
use App\Core\Application;

//Define root directory for all Application.
$rootDriPath = dirname( __DIR__ );

$app = new Application( $rootDriPath );

$app->router->get( '/', 'home' );

$app->router->get( '/contact', [SiteController::class, 'showContact'] );
$app->router->post( '/contact', [SiteController::class, 'handelContact'] );

// $app->router->get( '/login', [AuthController::class, 'handelContact'] );
$app->router->get( '/login', [AuthController::class, 'login'] );
$app->router->get( '/register', [AuthController::class, 'registration'] );
$app->router->post( '/register', [AuthController::class, 'registration'] );

$app->run();

?>