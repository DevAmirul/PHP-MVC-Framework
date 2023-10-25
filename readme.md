# PHP Micro Framework

A simple, fast, and small PHP MVC Framework that enables to develop modern applications with standard MVC structure and CLI command line tools. This framework using dependencies as minimum as possible. This project is not suitable for production, but you can use it for learning purposes.

## Table of Contents

- **[Installation](#installation)**
- **[Examples](#examples)**
- **[Main Structure](#main-structure)**
- **[Directories](#directories)**
- **[Service Providers](#service-providers)**
- **[Service Containers](#service-containers)**
- **[Configuration](#configuration)**
- **[Controllers](#controllers)**
- **[Middlewares](#middlewares)**
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
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;

Router::get('/welcome', function(){
    view('welcome');
})->name('user');
```
or
```php
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;
use App\Http\Controllers\WelcomeController;

Router::get('/', [WelcomeController::class, 'index'])->name('welcome');
```

### Dynamic Route

```php
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;

Router::get('/user/:id', function($id){
    echo 'User id - ' . $id;
})->where('^\d+$')->name('user');
```

### Middleware
```php
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;

Router::get('/user/:id', function($id){
    echo 'User id - ' . $id;
})->middleware('auth')->where('^\d+$')->name('user');
```

### Make controller

```cli
composer controller
```

### Make Middleware

```cli
composer middleware
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
