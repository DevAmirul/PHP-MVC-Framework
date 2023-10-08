<?php

class ami_table {

    /**
     * This up()**************-ase class.####***######**
     */
    public function up() {

        database->create('ami', [
            'id' => [
                'INT',
                'NOT NULL',
                'AUTO_INCREMENT',
                'PRIMARY KEY',
            ],
            'name' => [
                'VARCHAR(30)',
                'NOT NULL',
            ],
        ]);
    }
}