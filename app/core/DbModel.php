<?php

namespace App\Core;

use App\Core\Model;

abstract class DbModel extends Model {
    protected string $tableName;
    public string $primaryKey;

    //abstract method for declare all column name.
    abstract public function columnName();

    /**
     * This method stores the user input data in the database.
     *
     * @return bool
     */
    public function save() {
        $columNames = $this->columnName(); //Another name for it may be 'attribute'.

        $Statement = $this->prepare( "INSERT INTO {$this->tableName} (" . implode( ', ', $columNames ) . ") VALUES (:" . implode( ', :', $columNames ) . ")" );
        foreach ( $columNames as $columName ) {
            $Statement->bindValue( ":{$columName}", $this->$columName );
        }
        if ( $Statement->execute() ) {
            return true;
        }
        return false;

    }

    /**
     * return PDO prepare method.
     *
     * @param  string $sqlStatement
     * @return string
     */
    public function prepare( $sqlStatement ) {
        return Application::$app->db->pdo->prepare( $sqlStatement );
    }

    /**
     * This method queries the database to see if at least one data has been stored.
     *
     * @param  array $where
     * @return object
     */
    public function findOne( array $where ) {
        $attributes = array_keys( $where );
        $sql        = implode( ' AND ', array_map( fn( $attr ) => "$attr = :$attr", $attributes ) );
        $Statement  = $this->prepare( "SELECT * FROM $this->tableName WHERE $sql" );

        foreach ( $where as $key => $item ) {
            $Statement->bindValue( ":{$key}", $item );
        }
        $Statement->execute();
        return $Statement->fetchObject( static::class );
    }

    /**
     * This method stores the data logged in the session.
     *
     * @return bool
     */
    public function loginModel( string | int $key, DbModel $user ) {
        Application::$app->session->set( $key, $user );
        return true;
    }

    /**
     * This method call original remove() method for destroy the data logged in the session.
     *
     * @return string
     */
    public function logoutModel( string $key ) {
        Application::$app->session->remove( $key );
    }
}
