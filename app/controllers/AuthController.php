<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\Users;

class AuthController extends Controller {

    /**
     * login controller function
     *
     * @return string
     */
    public function login() {
        $this->setLayout( 'auth' );
        return $this->view( 'login' );
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
                $this->redirect('/');
            }
        }

        $this->setLayout( 'auth' );
        return $this->view( 'register', ['model' => $users] );

    }
}