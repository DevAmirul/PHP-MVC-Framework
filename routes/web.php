<?php

use App\Http\Controllers\WelcomeController;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;

/**
 * Here is where you can register routes for your application.
 */

Router::get('/', [WelcomeController::class, 'index'])->name('welcome');
