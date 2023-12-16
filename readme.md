# PHP MVC Framework

A simple, fast, and small PHP MVC Framework that enables to develope of modern applications with standard MVC structure and CLI command line tools. This framework uses dependencies as minimum as possible. Inspired by Laravel.

<em>**Click to view full [Documentation](https://github.com/DevAmirul/PHP-MVC-Framework/wiki/Documentation)**</em>

## Features:

- Service Provider & Container 

- Facade

- Request & Response

- Route

- Middlewares

- Controllers

- Views

- Models

- Database

- Authentication system

- Multiple Guards

- Mail

- Event

- Session

- Flush Session

- Helpers

- Command line interface(CLI)


## Table of Contents:

- **[Installation](#installation)**
- **[Examples](#examples)**
- **[Folder Structure](#folder-structure)**
- **[Directories](#directories)**
- **[Documentation](#documentation)**


## Installation

Install via git

```bash
 git clone https://github.com/DevAmirul/PHP-MVC-Framework.git my-app
 cd my-app
```

```bash
composer start
```

## Examples

#### Route

```php
Router::get('/welcome', function(){
    return view('welcome');
})->name('welcome');
```
or
```php
Router::get('/', [WelcomeController::class, 'index'])->name('welcome');
```

#### Dynamic Route

```php
Router::get('/users/:id', function(){
    //
})->where(['id'=>'^\d+$'])->name('user');
```

#### Middleware
```php
Router::get('/users/:id', function(){
    //
})->middleware('auth')->where(['id'=>'^\d+$'])->name('user');
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


## Documentation:

<em>**Click to view full [Documentation](https://github.com/DevAmirul/PHP-MVC-Framework/wiki/Documentation)**</em>


