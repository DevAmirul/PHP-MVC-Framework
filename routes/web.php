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
    return app()->getBindings();
})
->name('home');

// Router::get('/about/:id', function () {
//     echo 'from about function';
// })->middleware('auth')->name('name')->where('[1-9]$');

Router::get('/home/:id', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('index')
    ->where('[1-9]$');

Router::post('/home', [App\Http\Controllers\HomeController::class, 'create'])
    ->name('create');

// Router::post('/about/:id/:o', function () {
//     echo 'form user route func';
// })
//     ->name('postAbout')
//     ->where(['[0-9]$', '[a-z]$']);

Router::get('/about/:id/:o', function () {
    echo 'form about route func';
})->where(['[0-9]$', '[a-z]$'])->name('about')->middleware('auth');

Router::get('/user', function () {
    return abort(404);
})->name('user');
