<?php
namespace App\Models;

use App\Core\DbModel;
use App\Helpers\RULE;

class Users extends DbModel {

    protected $tableName = 'users';
    public string $primaryKey = 'id';

    public String $fullName        = '';
    public String $email           = '';
    public String $password        = '';
    public String $confirmPassword = '';
    public int $status             = 0;

    public function columnName() {
        $this->password = password_hash( $this->password, PASSWORD_DEFAULT );
        return [
            'fullName', 'email', 'password', 'status'
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
            'password'        => [[RULE::MIN, 2]],
            'confirmPassword' => [[RULE::MATCH, 'password'], [RULE::MIN, 2]],
        ];
    }
}
