# PHP Micro Framework

A simple, fast, and small PHP MVC Framework that enables to develop modern applications with standard MVC structure and CLI command line tools. Inspired by laravel. This framework using dependencies as minimum as possible. This project is not suitable for production, but you can use it for learning purposes.

## Table of Contents

- **[Installation](#installation)**
- **[Examples](#examples)**
- **[Main Structure](#main-structure)**
- **[Directories](#directories)**
- **[Service Providers & Container](#service-providers-&-container)**
- **[Configuration](#configuration)**
- **[Routes](#routes)**
- **[Middlewares](#middlewares)**
- **[Controllers](#controllers)**
- **[Views](#views)**
- **[Models](#models)**
- **[Database](#database)**
- **[Helpers](#helpers)**


## Installation

Install via git

```bash
 git clone https://github.com/DevAmirul/PHP-MVC-Micro-Framework.git my-app
 cd my-app
```

```
composer start
```

```
http://localhost:8000
```
Create the .env, then copy the .env.example file into the .env file. <br>
Create the database and connect the database into the .env file

## Examples

### Route

```php
Router::get('/welcome', function(){
    view('welcome');
})->name('welcome');
```
or
```php
Router::get('/', [WelcomeController::class, 'index'])->name('welcome');
```

### Dynamic Route

```php
Router::get('/user/:id', function(int $id){
    echo 'User id - ' . $id;
})->where('^\d+$')->name('user');
```

### Middleware
```php
Router::get('/user/:id', function(int $id){
    echo 'User id - ' . $id;
})->middleware('auth')->where('^\d+$')->name('user');
```

## Main Structure

```
root
├── App
│   ├── Exceptions
│   ├── Http
│   │   ├── Controllers
│   │   └── Middlewares
│   ├── Providers
│   └── Models
├── config
├── database
│   └── migrations
├── Public
├── resources
│   └── Views
│       ├── errors
│       └── layout
├── routes
├── src
│   └── core
│       ├── Foundation
│       │   ├── Application
│       │   │   ├── Container
│       │   │   ├── DateTime
│       │   │   ├── Events
│       │   │   ├── Facade
│       │   │   ├── Mail
│       │   │   ├── Redirect
│       │   │   ├── Request
│       │   │   ├── Supports
│       │   │   ├── Traits
│       │   │   └── Application.php
│       │   ├── Auth
│       │   ├── CLI
│       │   ├── Controller
│       │   ├── Database
│       │   ├── Exception
│       │   ├── Middleware
│       │   ├── Models
│       │   ├── Router
│       │   ├── Session
│       │   └── View
│       └── Helpers
└── vendor
```

## Directories

`app/Exceptions`: Create your custom exceptions in this folder.

`app/Models`: Create your custom models in this folder.

`app/Providers`: Create your custom services providers in this folder.

`app/Http/Controllers`: Create your custom controllers in this folder.

`app/Http/Middlewares`: Create your custom middlewares in this folder.

`config`: This folder contains system config files. Make your changes only in the config file.

`database/migrations`: This folder contains all migration class files.

`Public`: Upload all your custom files (css, js, img, bootstrap, etc.) into this folder. Your custom views will use these files.

`resources/views`: This folder contains all view files, Create your custom views in this folder.

`routes`: This folder contains all route files.

`src/core`: This folder contains the main Application, Model, View, and Controller's base files. All custom model, view, and controller files inherit from these. Don't make changes to these files if don't need really.

## Service Providers & Container
`app/Providers`: You can Register any application services and bootstrap any application service and want to do something before handling the request.

### Make providers

```cli
composer providers
```
Then enter a provider name.

After creating the provider add it to the provider array in the 'config/app.php' file.

```php
'providers' => [
    App\Providers\ExampleServiceProvider::class,
],
```

```php
namespace App\Providers;

use Devamirul\PhpMicro\core\Foundation\Application\Container\BaseContainer;
use Devamirul\PhpMicro\core\Foundation\Application\Container\Interface\ContainerInterface;

class ExampleServiceProvider extends BaseContainer implements ContainerInterface {

    /**
     * Register any application services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap any application services
     * and if you want to do something before handling the request.
     */
    public function boot(): void {
        //
    }

}
```

### Bind container:
```php
use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;

public function register(): void {

    $this->app->bind('Request', function () {
        return Request::singleton();
    });

}
```

## Configuration:
Open `config` folder, Here you will find some predefined files which you can modify as you wish.

The predefined config files are :- `app.php` `auth.php` `auth.php` `database.php` `mail.php` `middleware.php`

### config:
As you can change as per your wish in "app.php".
```php
return [
    /**
     * Application Name.
     */
    'app_name'  => env('APP_NAME', 'PhpMicroFramework'),

    /**
     * Application Url.
     */
    'app_url'   => env('APP_URL', 'http://localhost:8000'),

    /**
     * Application Home path.
     */
    'home_url'  => '/',

    /**
     * Application Timezone.
     */
    'timezone' => 'Asia/Dhaka',

    /**
     * Autoloaded All Service Providers.
     */
    'providers' => [
        AppServiceProvider::class,
        ApplicationContainer::class
    ],
];
```

## Routes:
`routes/web.php`: It is a simple and fast and lightweight route, inspired by Laravel route. You can do almost everything in this route as in Laravel route.

**You can give each route a unique name.**

```php
Router::get('/', [WelcomeController::class, 'index'])->name('welcome');
```
or

```php
Router::get('/welcome', function(){
    view('welcome');
})->name('user');
```

You can use dynamic route, you just need to use the ":" sign. This type of Route Patterns contain dynamic parts which can vary per request. Where you can get the dynamic value in the route function if you want.

**You can do method chaining if needed.**

```php
Router::get('/user/:id', function(int $id){
    echo 'User id - ' . $id;
})->where('^\d+$')->name('user');
```

**You can make the dynamic parameter optional if needed.**

```php
Router::get('/user/:id?', function(?int $id = null){
    echo 'User id - ' . $id;
})->where('^\d+$')->name('user');
```

Using the Route::fallback method, you may define a route that will be executed when no other route matches the incoming request.
```php
Route::fallback(function () {
    //
});
```
<em>**See the documentation for my "p-router" package for details:- [p-router](https://github.com/DevAmirul/p-router.git)**</em>

## Controllers:
`app/Http/Controllers`: Controllers respond to user actions (submitting forms, show users, any action etc.). Controllers are classes that extend the BaseController class.

Controllers are stored in the app/Controllers folder. A sample Welcome controllers are included. Controller classes need to be in the App/Controllers namespace. You can add subdirectories to organize your controllers.

<em>**By default you will get request instance in each method.**</em>

### Make controller

```cli
composer controller
```
Then enter a controller name.

```php
namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;

class ExampleController extends BaseController {
    /**
     * Dummy invoke method.
     */
    public function invoke(Request $request) {
        return view('example controller');
    }
}
```

## Middlewares:
Middleware provide a convenient mechanism for inspecting and filtering HTTP requests entering your application.

The predefined middleware files are :- `AuthMiddleware.php` `GuestMiddleware.php` `CsrfMiddleware.php`

<em>**By default you will get request instance in handle method.**</em>

### Make middlewares

```cli
composer middleware
```
Then enter a middleware name.

```php
namespace App\Http\Middleware;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Middleware\Interface\Middleware;

class AuthMiddleware implements Middleware {
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, array $guards) {
        //
    }
}
```

For example, This framework includes a middleware that verifies the user of your application is authenticated. If the user is not authenticated, the middleware will redirect the user to your application's login screen. However, if the user is authenticated, the middleware will allow the request to proceed further into the application.

```php
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Auth;
use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;

public function handle(Request $request, array $guards) {
    if (!empty($guards)) {
        foreach ($guards as $guard) {
            if (!Auth::guard($guard)->check() && $guard === 'admin') {
                return redirect('/admin/login');
            }
        }
    } elseif (!Auth::check()) {
        return redirect('/login');
    }
    return;
}
```
