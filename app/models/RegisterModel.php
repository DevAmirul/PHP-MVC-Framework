<?php
namespace App\Models;

use App\Core\Model;
use App\Helpers\RULE;

class RegisterModel extends Model {

    public String $fullName = '';
    public String $email = '';
    public String $password = '';
    public String $confirmPassword = '';

    public function register() {
        echo 'creation new user';
    }

    /**
     * Here define user input validation rules
     *
     * @return array
     */
    public function rules() {
        return [
            'fullName'        => [RULE::REQUIRE, RULE::EMAIL, [RULE::MAX, 4]],
            'email'           => [RULE::EMAIL, RULE::REQUIRE],
            'password'        => [[RULE::MIN, 8]],
            'confirmPassword' => [RULE::REQUIRE, [RULE::MATCH, 'password'], [RULE::MIN, 8]],
        ];
    }
}