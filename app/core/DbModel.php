<?php

namespace App\Core;

use App\Core\Model;

abstract class DbModel extends Model {
    protected $tableName;

    abstract public function columnName();

    public function save() {
        $columNames = $this->columnName(); //Another name for it may be 'attribute'.

        $Statement = $this->prepare( "INSERT INTO {$this->tableName} (" . implode( ', ', $columNames ) . ") VALUES (:" . implode( ', :', $columNames ) . ")" );
        foreach ( $columNames as $columName ) {
            $Statement->bindValue( ":{$columName}", $this->$columName );
        }
        $Statement->execute();
        return true;



    }

    /**
     * return PDO prepare method.
     *
     * @param  string $sqlStatement
     * @return void
     */
    public function prepare( $sqlStatement ) {
        return Application::$app->db->pdo->prepare( $sqlStatement );
    }
}

// class par {
//     protected $a;
//     function xx() {
//         echo $this->a;
//     }
// }

// class child extends par {
//     protected $a = 3;
// }

// $q = new child();
// echo $q->xx();
