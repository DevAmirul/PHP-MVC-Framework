<?php

namespace App\Models;

use App\Core\DbModel;
use App\Enums\RULE;

class Login extends DbModel {

    public string $email    = '';
    public string $password = '';

    public function columnName() {}

    public function rules() {
        return [
            'email'    => [RULE::EMAIL],
            'password' => [RULE::REQUIRE],
        ];
    }

    public function login() {
        $users = new Users();
        $user  = $users->findOne( ['email' => "$this->email"] );

        if ( !$user ) {
            $this->Error['email'] = 'User does not exist with this email';
            return false;
        } elseif ( !password_verify( $this->password, $user->password ) ) {
            $this->Error['password'] = 'Password is incorrect';
            return false;
        }

        return $this->loginModel( 'user', $user );
    }

}
