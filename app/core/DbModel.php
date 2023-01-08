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
        if ($Statement->execute()) {
            return true;
        }
        return false;

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
