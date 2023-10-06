<?php

// use App\Http\Controllers\HomeController;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your application.
|
 */

Router::get('/home/:id/user/:name', [App\Http\Controllers\HomeController::class, 'home'])
// ->where('id', '^\d+$');
    ->where(['id' => '^\d+$', 'name' => '^\d+$']);

// Router::get('/about/:id', function () {
//     echo 'from about function';
// })->middleware('auth')->name('name')->where('id', '[1-9]$');

Router::get('/about/ok', function () {
    return 'hello';
});
