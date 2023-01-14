<?php

namespace Routes;

use App\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your application.
|
 */

$app->router->get( '/', 'home' );
$app->router->get( '/aboutUs', 'aboutUs' );

$app->router->get( '/login', [AuthController::class, 'login'] );
$app->router->post( '/login', [AuthController::class, 'login'] );
$app->router->get( '/logout', [AuthController::class, 'logout'] );

$app->router->get( '/register', [AuthController::class, 'registration'] );
$app->router->post( '/register', [AuthController::class, 'registration'] );

$app->router->get( '/profile', [AuthController::class, 'profile'] );
