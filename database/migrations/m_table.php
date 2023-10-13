<?php

use Devamirul\PhpMicro\core\Foundation\CLI\Database\Base\BaseMigration;

class m_table extends BaseMigration{

    /**
     *
     */
    public function up() {

        return static::db()->create('m', [
            'id' => [
                'INT',
                'NOT NULL',
                'AUTO_INCREMENT',
                'PRIMARY KEY',
            ],
            'name' => [
                'VARCHAR(225)',
                'NOT NULL',
            ],
            'created_at' => [
                'TIMESTAMP',
                'NOT NULL',
                'DEFAULT',
                'CURRENT_TIMESTAMP'
            ],
            'updated_at' => [
                'TIMESTAMP',
                'NOT NULL',
                'DEFAULT',
                'CURRENT_TIMESTAMP'
            ],
        ]);
    }
}