<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\RegisterModel;

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

        $registerModel = new RegisterModel();
        if ( $request->isPost() ) {

            $registerModel->loadData();

            if ( $registerModel->validate() && $registerModel->register() ) {
                // return 'Success';
            }
            return $this->view( 'register', ['model' => $registerModel] );
        }


        $this->setLayout( 'auth' );
        return $this->view( 'register', ['model' => $registerModel] );

    }
}