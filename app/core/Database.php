<?php

namespace App\Core;

class Database {

    public \PDO$pdo;

    public function __construct( array $dbConfig ) {
        $dsn      = $dbConfig['dsn'];
        $user     = $dbConfig['user'];
        $password = $dbConfig['password'];

        try {
            $conn = new \PDO( $dsn, $user, $password, );
            $conn->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
            echo 'hello';
        } catch ( \PDOException$e ) {
            echo $e->getMessage();
        }

    }

}
