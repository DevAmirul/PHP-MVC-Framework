<?php

namespace Routes;

use App\Controllers\AuthController;
use App\Controllers\SiteController;

/**
 * Here declare all routers.
 */

$app->router->get( '/', 'home' );

$app->router->get( '/contact', [SiteController::class, 'showContact'] );
$app->router->post( '/contact', [SiteController::class, 'handelContact'] );

$app->router->get( '/login', [AuthController::class, 'login'] );
$app->router->get( '/register', [AuthController::class, 'registration'] );
$app->router->post( '/register', [AuthController::class, 'registration'] );
