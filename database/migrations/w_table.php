<?php

class w_table {

    /**
     * This up()**************-ase class.####***######**
     */
    public function up() {

        database->create('w', [
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