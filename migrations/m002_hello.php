<?php

class m002_hello {

    /**
     * Undocumented function
     *
     * @return void
     */
    public function up( $pdo ) {
        $sql = "CREATE TABLE hello (
            id INT PRIMARY KEY AUTO_INCREMENT,
            fullname VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";

        $pdo->exec( $sql );
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function down($pdo) {
        $sql = "DROP TABLE user";
        $pdo->exec( $sql );
    }
}
