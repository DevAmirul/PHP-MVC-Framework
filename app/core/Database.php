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
     * This is the main migration method.
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

            $classInstance     = new $className;
            $tableColumArray   = $classInstance->up();
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
     * This method create migrations table.
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
     * This method fetch all migrated table name from migrations table.
     *
     * @return array
     */
    public function getAppliedMigrations() {
        if ( $sqlStatement = $this->pdo->prepare( "SELECT migration FROM migrations" ) ) {;
            $sqlStatement->execute();
        }
        return $sqlStatement->fetchAll( \PDO::FETCH_COLUMN ) ?? false;

    }

    /**
     * This method save migrated table name to migrations table migration column.
     *
     * @param  array $newMigrationsList
     * @return void
     */
    public function saveMigrations( array $newMigrationsList ) {
        $migrationListStr = implode( "'), ('", $newMigrationsList );

        $sqlStatement = $this->pdo->prepare( "INSERT INTO migrations (migration) VALUES( '$migrationListStr' )" );
        $sqlStatement->execute();
    }
    /**
     * This method print migrations-CLI output.
     *
     * @param  string $outputStr
     * @return void
     */
    private function output( string $outputStr ) {
        echo $outputStr . PHP_EOL;
    }

    /**
     * This method create sql table statement and execute that sql statement.
     *
     * @param  array  $tableColumArray
     * @param  string $className
     * @return bool
     */
    private function createTableSqlStatement( array $tableColumArray, string $className ) {
        $constraintsStrArray = [];

        $className = substr( $className, 5 );

        foreach ( $tableColumArray as $constraints ) {
            $constraintsStrArray[] = implode( ' ', $constraints );
        }
        $constraintsStatement = implode( ', ', $constraintsStrArray );

        $sqlStatement = "CREATE TABLE {$className} ( {$constraintsStatement} ) ENGINE=INNODB;";

        if ( !$this->pdo->exec( $sqlStatement ) ) {
            $this->output( 'Created table name - ' . $className . ' table' );
            return true;
        } else {
            $this->output( $className . ' - could not be created' );
            return false;
        }
    }

    /**
     * This method drop all migrated table,and clear database.
     *
     * @return void
     */
    public function dropMigrations() {
        if ( $migratedTableName = $this->getAppliedMigrations() ) {
            $migratedTableName = ['m000_migrations', ...$migratedTableName];
            foreach ( $migratedTableName as $tableName ) {
                if ( $tableName === '.' || $tableName === '..' ) {
                    continue;
                }
                $tableName    = pathinfo( $tableName, PATHINFO_FILENAME );
                $tableName    = substr( $tableName, 5 );
                $sqlStatement = "DROP TABLE {$tableName}";
                if ( !$this->pdo->exec( $sqlStatement ) ) {
                    $this->output( 'Deleted table name - ' . $tableName . ' table' );
                } else {
                    $this->output( $tableName . ' - could not be deleted' );
                }
            }
        } else {
            $this->output( 'No table found' );
        }
    }
}
