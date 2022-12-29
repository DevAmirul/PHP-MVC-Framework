<?php
namespace App\Models;

use App\Core\Model;
use App\Helpers\RULE;

class RegisterModel extends Model {

    public String $fullName;
    public String $email;
    public String $password;
    public String $confirmPassword;

    public function register() {
        echo 'creation new user';
    }

    /**
     * Here define validation rules
     *
     * @return array
     */
    public function rules() {
        return [
            'fullName'=>[RULE::REQUIRE],
            'email'=>[RULE::EMAIL],
            'password'=>[RULE::MIN],
            'confirmPassword'=>[RULE::MATCH]
        ];
    }
}
