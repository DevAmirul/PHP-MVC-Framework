<?php

use App\Http\Controllers\WelcomeController;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;
use Devamirul\PhpMicro\core\Foundation\Application\Mail\Mail;

/**
 * Here is where you can register routes for your application.
 */

Router::get('/', [WelcomeController::class, 'index'])->name('welcome');
