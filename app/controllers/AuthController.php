<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Middleware\AuthMiddleware;
use App\Core\Request;
use App\Models\Login;
use App\Models\Users;

class AuthController extends Controller {

    // public function __construct() {
    //     $this->registerMiddleware( new AuthMiddleware( ['profile'] ) );
    // }

    /**
     * login controller function
     *
     * @return string
     */
    public function login( Request $request ) {
        $login = new Login();

        if ( $request->isPost() ) {
            $login->loadData();

            if ( $login->validate() && $login->login() ) {
                $this->redirect( '/' );
            }
        }
        $this->setLayout( 'auth' );
        return $this->view( 'login', ['model' => $login] );
    }


    public function logout() {
        Application::$app->logout( 'user' );
        $this->redirect('/');
    }

    /**
     * registration controller function
     *
     * @param  Request $request
     * @return void
     */
    public function registration( Request $request ) {

        $users = new Users();
        if ( $request->isPost() ) {
            $users->loadData();
            if ( $users->validate() && $users->save() ) {
                $this->setFlush( 'success', 'Thanks for registration' );
                $this->redirect( '/' );
            }
        }

        $this->setLayout( 'auth' );
        return $this->view( 'register', ['model' => $users] );

    }

    public function profile() {
        return $this->view( 'profile' );
    }
}
