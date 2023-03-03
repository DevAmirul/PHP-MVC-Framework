# Tiny-MVC-Framework
Minimalistic tiny php mvc framework created for educational purposes.

## This is a tiny framework made by me.The framework has not been tested in production. I will be working more on this framework in the future. I have followed the MVC pattern here.

#### This repository is a small crude application built by my own custom tiny PHP framework.

## The methods I have created in this framework are as follows:-

 #### Middleware
 #### Exception
 #### Response
 #### Router
   ######   -> get()
   ######   -> post()
   ######   -> redirect()
 #### Session
   ######   -> set()
   ######   -> get()
   ######   -> Remove()
   ######   -> setFlash()
   ######   -> getFlash()
   ######   -> isGuest()
 #### View
   ######   -> View()
 #### Request
   ######   -> getPath()
   ######   -> getMethod()
   ######   -> isGet()
   ######   -> isPost()
   ######   -> getBody()
 #### FormTemplate
   ######   -> field()
   ######   -> submit()
 #### Controller
   ######   -> setLayout()
 #### DbModel
   ######   ->  columnName()
   ######   -> save()
   ######   -> findOne()
   ######   -> loginModel()
   ######   -> logoutModel()
 #### Model
   ######   -> loadData()
   ######   -> validate()
   ######   -> rules()
   ######   -> hasError()
   ######   -> getError()
 #### Database Table Migration by CLI
 #### Database Table Drop Migration by CLI
 

----
## How to install-

1. Clone this project.
2. Create database.
3. Create `.env` file from `.env.example` file, then adjust database parameters.
4. Run `composer install`
5. Open terminal, run `cd CLI` or Enter `CLI\` folder.
6. Run migrations by executing `php migrations.php`.
7. Run `cd ../` or back from `CLI` folder, and enter public folder or run `cd public`
8. Start php server by running command `php -S 127.0.0.1:8000`.
8. Open in browser http://127.0.0.1:8000.
9. Run `php migrationsDrop.php` for drop migrated table.







