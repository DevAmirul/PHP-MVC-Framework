<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\RegisterModel;

class AuthController extends Controller {

    public function login() {
        $this->setLayout( 'auth' );
        return $this->view( 'login' );
    }

    public function registration( Request $request ) {

        $registerModel = new RegisterModel();
        if ( $request->isPost() ) {
            $registerModel->loadData( $request->getBody() );

            echo '<pre>';
            var_dump($registerModel);
            echo '</pre>';
            exit;

            if ( $registerModel->validate() && $registerModel->register() ) {
                return 'Success';
            }
            return $this->view( 'register', ['model' => 'RegisterModel'] );
        }
        $this->setLayout( 'auth' );
        return $this->view( 'register', ['model' => 'RegisterModel'] );

    }
}