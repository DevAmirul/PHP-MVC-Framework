<?php

class m001_users {

    /**
     * This up() method return table sql attribute to database class.
     *
     * @return array
     */
    public function up() {
        return [
            ['id', 'INT', 'PRIMARY', 'KEY', 'AUTO_INCREMENT'],
            ['fullname', 'VARCHAR(255)', 'NOT NULL'],
            ['email', 'VARCHAR(255)', 'NOT NULL'],
            ['password', 'VARCHAR(255)', 'NOT NULL'],
            ['status', 'TINYINT', 'NOT NULL'],
            ['created_at', 'TIMESTAMP', 'DEFAULT', 'CURRENT_TIMESTAMP'],
        ];
    }
}