<?php

class amirul_table {

    /**
     * This up()**************-ase class.####***######**
     */
    public function up() {

        database->create('amirul', [
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