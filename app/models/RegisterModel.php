<?php
namespace App\Models;

use App\Core\Model;

class RegisterModel extends Model {

    public String $fullName;
    public String $email;
    public String $password;
    public String $confirmPassword;

    public function register() {
        echo 'creation new user';
    }

    public function rules()
    {
        
    }
}