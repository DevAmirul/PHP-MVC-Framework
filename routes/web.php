<?php

use App\Http\Controllers\HomeController;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your application.
|
 */

Router::get('/', function(){
    return 'xxx';
});

Router::get('/home', [HomeController::class, 'home']);

// $app->router->get('/login', [AuthController::class, 'login']);
// $app->router->post('/login', [AuthController::class, 'login']);
// $app->router->get('/logout', [AuthController::class, 'logout']);

// $app->router->get('/register', [AuthController::class, 'registration']);
// $app->router->post('/register', [AuthController::class, 'registration']);

// $app->router->get('/profile', [AuthController::class, 'profile']);
