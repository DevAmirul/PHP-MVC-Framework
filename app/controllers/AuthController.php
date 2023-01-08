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

        $Users = new Users();
        if ( $request->isPost() ) {
            $Users->loadData();
            if ( $Users->validate() === true && $Users->save() === true ) {
                return $this->view( 'register', ['model' => $Users] );
            }
        }

        $this->setLayout( 'auth' );
        return $this->view( 'register', ['model' => $Users] );

    }
}