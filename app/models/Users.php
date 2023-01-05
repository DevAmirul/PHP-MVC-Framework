<?php
namespace App\Models;

use App\Core\DbModel;
use App\Helpers\RULE;

class Users extends DbModel {

    protected $tableName           = 'users';
    public String $fullName        = '';
    public String $email           = '';
    public String $password        = '';
    public String $confirmPassword = '';

    public function register() {
        $this->save();
    }

    public function columnName() {
        return [
            'fullName', 'email', 'password'
        ];
    }
    /**
     * Here define user input validation rules
     *
     * @return array
     */
    public function rules() {
        return [
            'fullName'        => [RULE::REQUIRE],
            'email'           => [RULE::EMAIL],
            'password'        => [[RULE::MIN, 3]],
            'confirmPassword' => [[RULE::MATCH, 'password'], [RULE::MIN, 3]],
        ];
    }
}
