<?php

use Devamirul\PhpMicro\core\Foundation\CLI\Database\Base\BaseMigration;

class users_table extends BaseMigration {

    /**
     * Run the migrations.
     */
    public function up() {
        return static::db()->create('users', [
            'id'          => [
                'INT',
                'NOT NULL',
                'AUTO_INCREMENT',
                'PRIMARY KEY',
            ],
            'name'        => [
                'VARCHAR(30)',
                'NOT NULL',
            ],
            'email'       => [
                'VARCHAR(225)',
                'NOT NULL',
                'UNIQUE',
            ],
            'password'    => [
                'VARCHAR(225)',
                'NOT NULL',
            ],
            'reset_token' => [
                'VARCHAR(255)',
                'DEFAULT NULL',
            ],
            'created_at'  => [
                'TIMESTAMP',
                'NOT NULL',
                'DEFAULT CURRENT_TIMESTAMP',
            ],
            'updated_at'  => [
                'TIMESTAMP',
                'NOT NULL',
                'DEFAULT NOW()',
                'ON UPDATE NOW()',
            ],
        ]);
    }
}
