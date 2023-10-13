<?php

use Devamirul\PhpMicro\core\Foundation\CLI\Database\Base\BaseMigration;

class as_table extends BaseMigration{

    /**
     * This up()**************-ase class.####***######**
     */
    public function up() {

        return static::db()->create('as', [
            'id' => [
                'INT',
                'NOT NULL',
                'AUTO_INCREMENT',
                'PRIMARY KEY',
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