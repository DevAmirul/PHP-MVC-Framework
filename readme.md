# PHP Micro Framework

PHP micro framework for web applications.

## Installation

Install via git

```bash
 git clone https://github.com/DevAmirul/php-micro-mvc-framework.git my-app
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

