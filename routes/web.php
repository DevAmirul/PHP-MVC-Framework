<?php

use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\RegisteredUserController;
use App\Models\E;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your application.
|
 */

Router::get('/', [HomeController::class, 'index'])->name('home');

Router::get('/login', [AuthenticatedController::class, 'create'])->name('login');
Router::post('/login', [AuthenticatedController::class, 'store'])->name('login');

Router::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Router::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Router::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('forgot.password');
Router::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('forgot.password');

Router::get('/reset', [NewPasswordController::class, 'create'])->name('reset');
Router::post('/reset', [NewPasswordController::class, 'store'])->name('reset');
