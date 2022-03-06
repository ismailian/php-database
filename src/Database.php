<?php

namespace PhpDatabase;

use Exception;
use PDO;
use PDOException;
use PhpDatabase\Helpers\Clause;
use PhpDatabase\Helpers\Command;
use PhpDatabase\Helpers\QueryBuilder;
use PhpDatabase\Helpers\Variables;

/**
 * this is the database class.
 * it handles all the processes ranging from top level commands (eg: select, insert..etc.)
 * to specific clauses (eg: where, limit..etc.)
 */
class Database
{

    use Variables;
    use QueryBuilder;
    use Command;
    use Clause;

    /**
     * default constructor
     * 
     * @param string $hostname the database server.
     * @param string $username the database username.
     * @param string $password the database password.
     * @param string $database the database name.
     */
    function __construct($hostname, $username, $password, $database)
    {
        /* set the properties */
        $this->dbHostname = $hostname;
        $this->dbUsername = $username;
        $this->dbPassword = $password;
        $this->dbDatabase = $database;

        /** pdo options */
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );

        try {
            /* connect to database */
            $this->dbResource = new \PDO(
                "mysql:host={$this->dbHostname};dbname={$this->dbDatabase}",
                $this->dbUsername,
                $this->dbPassword,
                $options
            );
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * default destructor
     */
    function __destruct()
    {
    }
}
