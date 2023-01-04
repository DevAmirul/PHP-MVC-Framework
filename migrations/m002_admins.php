<?php

class m002_admins {

    /**
     * Undocumented function
     *
     * @return void
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

    /**
     * Undocumented function
     *
     * @return void
     */
    public function down( $pdo ) {
    }
}