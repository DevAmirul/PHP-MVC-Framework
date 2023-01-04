<?php

namespace App\Core;

class Database {

    public \PDO$pdo;

    public function __construct( array $dbConfig ) {
        $dsn      = $dbConfig['dsn'] ?? '';
        $user     = $dbConfig['user'] ?? '';
        $password = $dbConfig['password'] ?? '';

        try {
            $this->pdo = new \PDO( $dsn, $user, $password, );
            $this->pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );

        } catch ( \PDOException$e ) {
            echo $e->getMessage();
        }
    }

    /**
     * This method main migration method.
     *
     * @return void
     */
    public function applyMigrations() {
        $newMigrationsList = [];

        $this->createMigrationsTable();
        $appliedMigration = $this->getAppliedMigrations();

        $files            = scandir( Application::$ROOT_DIR_PATH . '/migrations' );
        $toApplyMigration = array_diff( $files, $appliedMigration );

        foreach ( $toApplyMigration as $migration ) {
            if ( $migration === '.' || $migration === '..' ) {
                continue;
            }
            require_once Application::$ROOT_DIR_PATH . '/migrations/' . $migration;

            $className = pathinfo( $migration, PATHINFO_FILENAME );

            $instance          = new $className;
            $tableColumArray   = $instance->up( $this->pdo );
            $createTableReturn = $this->createTableSqlStatement( $tableColumArray, $className );

            if ( $createTableReturn ) {
                $newMigrationsList[] = $migration;
            }
        }

        if ( !empty( $newMigrationsList ) ) {
            $this->saveMigrations( $newMigrationsList );
        } else {
            $this->output( 'All migration are applied' );
        }

    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function createMigrationsTable() {
        $this->pdo->exec( "CREATE TABLE IF NOT EXISTS migrations(
            id INTEGER AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;" );
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getAppliedMigrations() {
        $statement = $this->pdo->prepare( "SELECT migration FROM migrations" );
        $statement->execute();

        return $statement->fetchAll( \PDO::FETCH_COLUMN );

    }

    /**
     * Undocumented function
     *
     * @param  array $newMigrationsList
     * @return void
     */
    public function saveMigrations( array $newMigrationsList ) {
        $migrationListStr = implode( "'), ('", $newMigrationsList );

        $statement = $this->pdo->prepare( "INSERT INTO migrations (migration) VALUES( '$migrationListStr' )" );

        $statement->execute();

    }

    private function output( string $outputStr ) {
        echo $outputStr . PHP_EOL;
    }

    private function createTableSqlStatement( array $tableColumArray, string $className ) {
        $constraintsStrArray = [];

        $className = substr( $className, 5 );

        foreach ( $tableColumArray as $constraints ) {
            $constraintsStrArray[] = implode( ' ', $constraints );
        }
        $constraintsStatement = implode( ', ', $constraintsStrArray );

        $sqlStatement = "CREATE TABLE {$className} ( {$constraintsStatement} ) ENGINE=INNODB;";

        if ( !$this->pdo->exec( $sqlStatement ) ) {
            $this->output( 'Created table name - ' . $className );
            return true;
        } else {
            $this->output( $className . ' - could not be created' );
            return false;
        }
    }

    private function dropTableSqlStatement( string $className ) {
        $className = substr( $className, 5 );

        $sqlStatement = "DROP TABLE {$className}";
        if ( !$this->pdo->exec( $sqlStatement ) ) {
            $this->output( 'Deleted table name - ' . $className );
            return true;
        } else {
            $this->output( $className . ' - could not be deleted' );
            return false;
        }
    }
}
