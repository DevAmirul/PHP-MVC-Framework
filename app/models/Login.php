<?php

namespace App\Models;

use App\Core\Application;
use App\Core\Model;
use App\Helpers\RULE;
use App\Helpers\RULES;

class Login extends Model {

    public string $email    = '';
    public string $password = '';

    public function rules() {
        return [
            'email'    => [RULE::REQUIRE],
            'password' => [RULE::EMAIL, RULE::REQUIRE],
        ];
    }

    public function login() {
        $users = Users::findOne( ['email' => '$this->email'] );
        if ( !$users ) {
            $this->Error[$this->email][] = 'User does not exist with this email';
            return false;
        } elseif ( !password_verify( $this->password, $users->password ) ) {
            $this->Error[$this->password][] = 'password is incorrect';
            return false;
        }

        return Application::$app->login($users);


    }
}