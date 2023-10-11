<?php

use Devamirul\PhpMicro\core\Foundation\Database\CLI\BaseMigration;

class amirul_table extends BaseMigration {

    /**
     * This up()**************-ase class.####***######**
     */
    public function up() {

        return static::db()->create('amirul', [
            'id'         => [
                'INT',
                'NOT NULL',
                'AUTO_INCREMENT',
                'PRIMARY KEY',
            ],
            'name'       => [
                'VARCHAR(30)',
                'NOT NULL',
            ],
            "created_at" => [
                "TIMESTAMP",
                "NOT NULL",
                "DEFAULT",
                "CURRENT_TIMESTAMP",
            ],
        ]);
    }
}