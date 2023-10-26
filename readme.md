# PHP Micro Framework

A simple, fast, and small PHP MVC Framework that enables to develop modern applications with standard MVC structure and CLI command line tools. Inspired by laravel. This framework using dependencies as minimum as possible.

## Table of Contents

- **[Installation](#installation)**
- **[Examples](#examples)**
- **[Folder Structure](#folder-structure)**
- **[Directories](#directories)**
- **[Service Providers and Container](#service-providers-and-container)**
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
    return view('welcome');
})->name('welcome');
```
or
```php
Router::get('/', [WelcomeController::class, 'index'])->name('welcome');
```

### Dynamic Route

```php
Router::get('/users/:id', function(int $id){
    return 'User id - ' . $id;
})->where('^\d+$')->name('user');
```

### Middleware
```php
Router::get('/users/:id', function(int $id){
    return 'User id - ' . $id;
})->middleware('auth')->where('^\d+$')->name('user');
```

## Folder Structure

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

## Service Providers and Container
`app/Providers`: You can Register any application services and bootstrap any application service and want to do something before handling the request.

### Make providers

```cli
composer providers
```

The command line interface will ask you for a provider name, you enter a name. It will automatically add "ServiceProvider" to the name you provided. For example you want to create a provider named "example". Then your provider class will be `ExampleServiceProvider.php`

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

#### Bind container:
```php
public function register(): void {

    $this->app->bind('example', function () {
        return new example();
    });

}
```
#### Resolve container:
```php
app()->make('example');
```
#### Get all bound container:
```php
app()->getBindings();
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
    return view('welcome');
})->name('user');
```

You can use dynamic route, you just need to use the ":" sign. This type of Route Patterns contain dynamic parts which can vary per request. Where you can get the dynamic value in the route function if you want.

**You can do method chaining if needed.**

```php
Router::get('/users/:id', function(int $id){
    return 'User id - ' . $id;
})->where('^\d+$')->name('user');
```

**You can make the dynamic parameter optional if needed.**

```php
Router::get('/users/:id?', function(?int $id = null){
    return 'User id - ' . $id;
})->where('^\d+$')->name('user');
```

Using the Route::fallback method, you may define a route that will be executed when no other route matches the incoming request.
```php
Route::fallback(function () {
    //
});
```
<em>**See the documentation for my "p-router" package for details:- [p-router](https://github.com/DevAmirul/p-router.git)**</em>


## Middlewares:

Middleware provide a convenient mechanism for inspecting and filtering HTTP requests entering your application.

The predefined middleware files are :- `AuthMiddleware.php` `GuestMiddleware.php` `CsrfMiddleware.php`

<em>**By default you will get request instance in handle method.**</em>

### Make middleware

```cli
composer middleware
```

The command line interface will ask you for a middleware name, you enter a name. It will automatically add "Middleware" to the name you provided. For example you want to create a middleware named "example". Then your middleware class will be `ExampleMiddleware.php`


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
### Add middleware
// TODO: add config
We can easily add middleware to root. As Laravel does.

```php
Router::get('/users/:id', function(int $id){
    return 'User id - ' . $id;
})->name('users')->middleware('auth');
```

**We can optionally pass the guard name as a parameter to the middleware if there is multiple auth using guard.**

```php
Router::get('/login', [AuthenticatedController::class, 'create'])->name('login')->middleware('guest:admin');
```


## Controllers:
`app/Http/Controllers`: Controllers respond to user actions (submitting forms, show users, any action etc.). Controllers are classes that extend the BaseController class.

Controllers are stored in the app/Controllers folder. A sample Welcome controllers are included. Controller classes need to be in the App/Controllers namespace. You can add subdirectories to organize your controllers.

<em>**By default you will get request instance in each method.**</em>

### Make controller

```cli
composer controller
```
The command line interface will ask you for a controller name, you enter a name. It will automatically add "Controller" to the name you provided. For example you want to create a controller named "example". Then your controller class will be `ExampleController.php`

```php
namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;

class UserController extends BaseController {
    /**
     * User show method.
     */
    public function show(Request $request) {
        return 'user name -' . $request->input('name');
    }
}
```

## Views:

Views are used to display information. Views separate your controller / application logic from your presentation logic and are stored in the resources/views directory.  No database access or anything like that should occur in a view file.

**Fortunately you get a helper function of the main 'view' class.**

```php
Router::get('/welcome', function(){
    return view('welcome');
})->name('welcome');
```

If you want to pass data to "view" files, you may pass an array of data to views to make that data available to the view:

```php
return view('welcome', ['name' => 'Amirul']);
```

When passing information in this manner, the data should be an array with key / value pairs. After providing data to a view, you can then access each value within your view using the data's keys, such as

```php
<?php echo $name; ?>
```

You can send a status code if you want.

```php
return status(200)->view('welcome');
```
You can set a different layout for the "view" file if you want. By default the layout will be "app.view.php".

```php
return layout('main')->view('welcome');
```
or

```php
return layout('main')->status(200)->view('welcome');
```

## Models:
// TODO: cli
Models are used to get and store data in your application. They know nothing about how this data will be presented in the views. Models extend the core\Model class and use PDO to access the database (by Medoo). They're stored in the App/Models folder.

```php
namespace App\Models;

use Devamirul\PhpMicro\core\Foundation\Models\BaseModel;

class Users extends BaseModel {
    protected $table = 'editors'
}
```

If your model's corresponding database table does not fit this convention, you may manually specify the model's table name by defining a table property on the model:

```php
protected $table = 'editors'
```

## Database:

Almost every modern web application interacts with a database. micro framework makes interacting with databases extremely simple across a variety of supported databases using SQL.

"Medoo" is handling all queries with SQL-92 standard. You should keep in mind the quotation marks in the query, or use prepared statements to prevent SQL injection as possible.

Internally it uses a **PHP** database package called **medoo**.// TODO: link

The configuration for database services is located in your application's `config/database`.php configuration file. In this file, you may define all of your database connections, as well as specify which connection should be used by default.

### Config:
```php
return [
    /**
     * Default Database Connection Name.
     */
    'default'     => env('DB_CONNECTION', 'mysql'),

    /**
     * Define multiple database Configurations.
     */
    'connections' => [
        'mysql' => [
            'driver'   => 'mysql',
            'host'     => env('DB_HOST', '127.0.0.1'),
            'port'     => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'php_micro_framework'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'error'    => env('DB_ERROR', 'PDO::ERRMODE_EXCEPTION'),
        ],
    ],
];
```

### DB instance:

**DB::db()** actually returns a **Medoo** singleton instance behind the scenes.

```php
DB::db();
```

**You can easily perform tasks using model.**
#### Model:

If your model's corresponding database table does not fit this convention, you may manually specify the model's table name by defining a table property on the model:

```php
protected $table = 'editors'
```

The target columns of data will be fetched and The WHERE clause to filter records.
`select($columns, $where(optional))`

```php
$user = new User();

$user->select([
	"user_name",
	"email"
], [
    // Where condition.
	"user_id[>]" => 100
])->getData();
```
#### Table Joining:
SQL JOIN clause can combine rows between two tables. Medoo provides a simple syntax for the JOIN clause.

[>] ==> LEFT JOIN
[<] ==> RIGHT JOIN
[<>] ==> FULL JOIN
[><] ==> INNER JOIN

```php
$user = new User();

$user->select([
	// Here is the table relativity argument that tells the relativity between the table you want to join.
	"[>]account" => ["author_id" => "user_id"]
], [
	"post.title",
	"account.city"
])->getData();
```

#### Data Mapping:
```php
$user = new User();

$user->select([
	"[>]account" => ["user_id"]
], [
	"post.content",

	"userData" => [
		"account.user_id",
		"account.email",

		"meta" => [
			"account.location",
			"account.gender"
		]
	]
], [
	"LIMIT" => [0, 2]
])->getJson()->getData();
```

#### Insert:
Insert one or more records into the table.
`insert($values)`

```php
$user = new User();

$user->insert([
	[
		"user_name" => "foo",
		"email" => "foo@bar.com",
	],
	[
		"user_name" => "bar",
		"email" => "bar@foo.com",
	]
]);
// Get last inserted id.
$user->id();
```

#### Errors And Error Handling:

```php
$user = new User();

$user->select([
	"user_name",
	"email"
])->getData();

// DB::db()->error and DB::db()->errorInfo will be null value if no error occurred.
// You can simply check if the value is null or not to know about that.
if ($user->error()) {
	echo "Error happened!";
};
```
<em>**See the "medoo" documentation for details.**</em>

**You can invoke all methods of "medoo" from the model.**

**However, 2 things should be noted.**

1. You cannot use the table names shown in the "sql query " in the "medoo" documentation, because the framework will magically choose the table names based on the model. So model name and table name should be same.

**In meddo documention**
```php
// Here the table name "user" is used.
DB::db()->select("users", [
	"user_name",
	"email"
]);
```

**In framework**
```php
// Here automatically the table name will be obtained from the "new User()" model.
$user = new User();

$user->select([
	"user_name",
	"email"
]);
```

2. Also you need to use "getData()" method to get the data.

**In meddo documention**
```php
$user = DB::db()->select("users", [
	"user_name",
	"email"
]);

print_r($user);
```

**In framework**
```php
$user = new User();

$user = $user->select([
	"user_name",
	"email"
])->getData();

print_r($user);
```

**Also run customized raw queries easily.**

### Raw Query:

`query($query)`

```php
DB::db()->query("SELECT email FROM account")->fetchAll();
```

The query() also supports prepared statements. Medoo will auto-detect the data type for input parameters.

```php
DB::db()->query(
	"SELECT * FROM <account> WHERE <user_name> = :user_name AND <age> = :age", [
		":user_name" => "John Smite",
		":age" => 20
	]
)->fetchAll();
```

Medoo is based on the PDO object. You can access the PDO object directly via using $database->pdo, so that you can use all PDO methods if you needed, like prepare, transaction, rollBack, or more.

#### Transaction:

```php
DB::db()->pdo->beginTransaction();

DB::db()->insert("account", [
	"user_name" => "foo",
	"email" => "foo@bar.com",
	"age" => 25
]);

/* Commit the changes */
DB::db()->pdo->commit();

/* Recognize mistakes and roll back changes */
DB::db()->pdo->rollBack();
```

#### Create a table:

`create($table, $columns, $options)`

```php
DB::db()->create("account", [
	"id" => [
		"INT",
		"NOT NULL",
		"AUTO_INCREMENT",
		"PRIMARY KEY"
	],
	"first_name" => [
		"VARCHAR(30)",
		"NOT NULL"
	]
]);
```


## Helpers:

Micro frameworks provide some helper methods for the convenience of developers.

#### General Helpers:

**Get Application instance**
```php
app()
```
**Get config data**
```php
config();
```
```php
config('app', 'timezone');
```
**Get env data**
```php
env();
```
```php
env('APP_NAME', 'default');
```
**View the data in details then exit the code**
```php
dd([1,2,3]);
```
**View the data in details**
```php
dump();
```
**Set page title**
```php
setTitle();
```
```php
<?php setTitle('login');?>
```
**Get page title, Use it in title tags**
```php
getTitle();
```
```php
<title><?= getTitle() ?></title>
```
**Get session instance**
```php
session();
```
**Get flushMessage instance**
```php
flushMessage();
```
**Get auth instance**
```php
auth();
```
```php
auth()->user();
```
**Get bcrypt password**
```php
passwordHash('password');
```
**Get event instance**
```php
event();
```
**Get app base path**
```php
basePath();
```
**Get app url**
```php
url();
```

#### Form Helpers:

**Set new CSRF value**
```php
setCsrf();
```
```php
<form>
    <?=setCsrf()?>
</form>
```
**Check CSRF is valid or not, return bool**
```php
isCsrfValid();
```
**Set form method, like put/patch/delete**
```php
setMethod('delete');
```
```php
<form>
    <?=setMethod('delete')?>
</form>
```

**Get errors data from  flush session by key**
```php
errors($key);
```
```php
<?=errors($key)?>
```
**Get error data form flush session**
```php
error()
```
```php
<?=error()?>
```

**Check if the error is set to session, return bool**
```php
hasError();
```
**Get success data form flush session**
```php
success();
```
```php
<?=success()?>
```
**Check if the success is set to session, return bool**
```php
hasSuccess();
```

#### Request Helpers:

**Get request instance**
```php
request();
```
```php
request()->input();
```

#### Response Helpers:

**The abort function throws an HTTP exception which will be rendered by the exception handler**
```php
abort(404, 'optional message');
```
**Redirect link**
```php
redirect('/redirect-link');
```
**Create a new redirect response to the previous location**
```php
back();
```
**Finds routes by route name and redirect this route**
```php
route('users');
```
**Get the evaluated view contents for the given view**
```php
view('welcome');
```
**Set the response status code with the view content**
```php
status(200);
```
```php
return status(200)->view('welcome');
```
**Set the view layout**
```php
layout('app');
```
```php
return layout('app')->view('welcome');
```
