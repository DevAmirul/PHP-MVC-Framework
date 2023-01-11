<?php

namespace App\Models;

use App\Core\DbModel;
use App\Helpers\RULE;

class Login extends DbModel {

    public string $email    = '';
    public string $password = '';

    public function columnName() {

    }

    public function rules() {
        return [
            'email'    => [RULE::EMAIL,RULE::REQUIRE],
            'password' => [RULE::REQUIRE],
        ];
    }

    public function login() {
        $users = new Users();
        $users->findOne( ['email' => "$this->email"] );
        // echo '<pre>';
        // var_dump( $users );
        // echo '</pre>';
        // exit;
        if ( !$users ) {
            $this->Error[$this->email][] = 'User does not exist with this email';
            return false;
        } elseif ( !password_verify( $this->password, $users->password ) ) {
            $this->Error[$this->password][] = 'password is incorrect';
            return false;
        }

        // return Application::$app->login( $users );

    }
}