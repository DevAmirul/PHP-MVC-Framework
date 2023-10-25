# PHP Micro Framework

A simple, fast, and small PHP MVC Framework that enables to develop modern applications with standard MVC structure and CLI command line tools. This framework using dependencies as minimum as possible. This project is not suitable for production, but you can use it for learning purposes.

### Table of Contents

- **[Installation](#installation)**
- **[Main Structure](#main-structure)**
- **[Directories](#directories)**
- **[Configuration](#configuration)**
- **[URL Scheme Examples](#url-scheme-examples)**
- **[Controllers](#controllers)**
- **[Views](#views)**
- **[Models](#models)**
- **[Page Caching](#page-caching)**

### Main Structure

```
root
├── App
│   ├── Controllers
│   │   ├── Error.php
│   │   └── Home.php
│   ├── Models
│   │   ├── Error.php
│   │   └── Home.php
│   └── Views
│       ├── Error.php
│       └── Home.php
├── Core
│   ├── App.php
│   ├── Controller.php
│   ├── Model.php
│   └── View.php
├── Public
│   ├── cache
│   ├── css
│   ├── img
│   └── js
├── System
│   ├── Config.php
│   ├── SunCache.php
│   ├── SunDB.php
│   └── SunSitemap.php
├── .htaccess
├── index.php
└── init.php
```


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

## Usage/Examples

#### Abailable Routes:

### Route

```php
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router;

Router::get('/welcome', function(){
    echo 'Welcome user';
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
})->where('^\d+$')->middleware('auth')->name('user');
```

### Make controller

```cli
composer controller
```

### Make Middleware

```cli
composer middleware
```

