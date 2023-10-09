<?php

class i_table {

    /**
     * This up()**************-ase class.####***######**
     */
    public function up() {

        database->create('i', [
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