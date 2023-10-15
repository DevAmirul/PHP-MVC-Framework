<?php

use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\RegisteredUserController;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your application.
|
 */

Router::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Router::get('/login', [AuthenticatedController::class, 'create'])->name('login')->middleware('guest');
Router::post('/login', [AuthenticatedController::class, 'store'])->name('login')->middleware('guest');

Router::delete('/logout', [AuthenticatedController::class, 'destroy'])->name('logout')->middleware('auth');

Router::get('/register', [RegisteredUserController::class, 'create'])->name('register')->middleware('guest');
Router::post('/register', [RegisteredUserController::class, 'store'])->name('register')->middleware('guest');

Router::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('forgot.password')->middleware('guest');
Router::put('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('forgot.password')->middleware('guest');

Router::get('/reset', [NewPasswordController::class, 'create'])->name('reset')->middleware('guest');
Router::put('/reset', [NewPasswordController::class, 'store'])->name('reset')->middleware('guest');
