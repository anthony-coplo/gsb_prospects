<?php
/**
 * PHP version 7.0
 * gsb_prospects/src/model/dao/AbstractDAO.php
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */

namespace gsb_prospects\model\dao;

use \PDOException;
use \PDO;

/**
 * Class AbstractDAO
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
abstract class AbstractDAO
{
    const DRIVER = "mysql";
    const HOST = "host=localhost;";
    const DBNAME = "dbname=gsb_prospects;";
    const CHARSET = "charset=UTF8;";

    const DSN = self::DRIVER . ":" . self::HOST . self::DBNAME . self::CHARSET;

    const USER = "gsb";
    const PASSWORD = "gsb!2017";

    protected $table  = null;
    protected $class  = null;
    protected $joinedTables = [];
    protected $fields = [];

    private $_connexion = null;

    /**
     * Function getConnexion
     * Open database connection and return database connection handler (dbh)
     *
     * @return object PDO connection
     */
    protected function getConnexion()
    {
        if (empty($this->_connexion)) {
            try {
                $this->_connexion = new PDO(self::DSN, self::USER, self::PASSWORD);
            } catch (PDOException $e) {
                print("<p>PDOException {$e->getCode()}</p>" . PHP_EOL);
                print("<p>{$e->getMessage()}</p>" . PHP_EOL);
                die();
            }
        }
        return $this->_connexion;
    }

    /**
     * Procedure closeConnexion
     * Close database connection
     *
     * @return void
     */
    protected function closeConnexion()
    {
        $connexion = null;
    }

    /**
     * Function join
     * generate sql join
     *
     * @param array $joinedTables join items :
     *                            type, table to join, 
     *                            foreign table, foreign key, 
     *                            primary table, primary key
     *
     * @return string join query
     */
    protected function join($joinedTables = []): string
    {
        // Structure : [ "Type"=>"", "Table"=>"", "Foreign Table"=>"", "Foreign Key"=>[], "Primary Table"=>"", "Primary Key"=>[] ]

        if (empty($joinedTables)) {
            $joinedTables = $this->joinedTables;
        }

        $str = "";
        foreach ($joinedTables as $join) {
            // default join type
            if (!isset($join['Type'])) {
                $join['Type'] = "Join";
            }
            // check join type
            switch($join['Type']) {
            case "Join":
                $type = "JOIN";
                break;
            case "Inner":
                $type = "INNER JOIN";
                break;
            case "Outer":
                $type = "OUTER JOIN";
                break;
            case "Natural":
                $type = "NATURAL JOIN";
                break;
            }
            // init join statement
            $str .= "{$type} `{$join['Table']}` ON ";
            // check join keys
            $count_FK = count($join["Foreign Key"]);
            $count_PK = count($join["Primary Key"]);
            $count = ($count_FK <= $count_PK) ? $count_FK: $count_PK;
            for ($index = 0; $index < $count; $index++) {
                if ($index != 0) {
                    $str .= " AND ";
                }
                $str .= "`{$join['Foreign Table']}`.`{$join['Foreign Key'][$index]}` = `{$join['Primary Table']}`.`{$join['Primary Key'][$index]}`";
            }
            $str .= PHP_EOL;
        }
        return $str;
    }

    /**
     * Function find
     * Generate a SELECT query to find item by id
     *
     * @param int $id id to find
     *
     * @return object instanceof $this->class
     */
    public function find($id)
    {
        /* Generate SQL query */
        $query  = "SELECT * FROM `{$this->table}`" . PHP_EOL;
        if (! empty($this->joinedTables)) {
            $query .= $this->join();
        }
        $query .= "WHERE `id` = :id;";
        
        /* Open connection */
        $dbh = $this->getConnexion();

        /* Prepare statement */
        $sth = $dbh->prepare($query);

        /* Bind Parameters */
        $sth->bindParam(":id", $id);

        /* Configure object hydratation */
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->class, $this->fields);

        /* Execute query */
        $sth->execute();

        /* Fetch a row, create and hydrate object instance */
        $object = $sth->fetch();

        /* Close connection */
        $this->closeConnexion();

        /* Check error */
        if (! $object) {
            $message = $sth->errorInfo()[2];    // Error Message
            $code = $sth->errorInfo()[0];       // SQLSTATE
            if ($code == 0 && empty($message)) {
                $message = "unknown id $id";
            }
            throw new DAOException($message, $code);
        }

        return $object;
    }

    /**
     * Function findAll
     * Generate a SELECT query to find all items from a table
     *
     * @return array collection of objects instanceof $this->class
     */
    public function findAll()
    {
        $query = "SELECT * FROM `{$this->table}`;" . PHP_EOL;
        if (! empty($this->joinedTables)) {
            $query .= $this->join();
        }
        $query .= ";";
        
        $dbh = $this->getConnexion();
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->class, $this->fields);
        $sth->execute();
        $objects = $sth->fetchAll();
        $this->closeConnexion();

        if (! $objects) {
            $message = $sth->errorInfo()[2];    // Error Message
            $code = $sth->errorInfo()[0];       // SQLSTATE
            if ($code != 0) {
                throw new DAOException($message, $code);
            }
        }

        return $objects;
    }

    /**
     * Function insert
     * Generate a INSERT INTO query to record an object in a table
     *
     * @param object $object by reference
     *
     * @return bool true if query succeded
     */
    public function insert(&$object)
    {
        $fields_count = count($this->fields);
        $object_vars = $object->get_object_vars();
        
        $query  = "INSERT INTO `{$this->table}`" . PHP_EOL;
        $query .= "(";
        foreach ($this->fields as $index => $field) {
            $query .= "`{$field}`";
            if ($index < $fields_count - 1) {
                $query .= ", ";
            }
        }
        $query .= ")" . PHP_EOL;
        $query .= "VALUES" . PHP_EOL;
        $query .= "(";
        foreach ($this->fields as $index => $field) {
            if ($object_vars[$field] === null) {
                $query .= "NULL";
            } else {
                $query .= ":{$field}";
            }
            if ($index < $fields_count - 1) {
                $query .= ", ";
            }
        }
        $query .= ");";
        
        $dbh = $this->getConnexion();
        $sth = $dbh->prepare($query);
        foreach ($this->fields as $index => $field) {
            if ($object_vars[$field] != null) {
                $sth->bindParam(":{$field}", $object_vars[$field]);
            }
        }
        $result = $sth->execute();
        $this->closeConnexion();
        
        if (!$result) {
            $message = $sth->errorInfo()[2];    // Error Message
            $code = $sth->errorInfo()[0];       // SQLSTATE
            if ($code != 0) {
                throw new DAOException($message, $code);
            }
        } else {
            $id = $dbh->lastInsertId();
            $object->SetId($id);
        }
        
        return $result;
    }

    /**
     * Function update
     * Generate a UPDATE query to update an object in a table
     *
     * @param object $object
     *
     * @return bool true if query succeded
     */
    public function update($object)
    {
        $fields_count = count($this->fields);
        $object_vars = $object->get_object_vars();
        
        $query  = "UPDATE `{$this->table}` SET" . PHP_EOL;
        foreach ($this->fields as $index => $field) {
            if ($field != "id") {
                $query .= "`{$field}` = ";
                if ($object_vars[$field] === null) {
                    $query .= "NULL";
                } else {
                    $query .= ":{$field}";
                }
                if ($index < $fields_count - 1) {
                    $query .= ",";
                }
                $query .= PHP_EOL;
            }
        }
        $query .= "WHERE `id` = :id;";
         
        $dbh = $this->getConnexion();
        $sth = $dbh->prepare($query);
        foreach ($this->fields as $index => $field) {
            if ($object_vars[$field] != null) {
                $sth->bindParam(":{$field}", $object_vars[$field]);
            }
        }
        $result = $sth->execute();
        $this->closeConnexion();
        
        if (!$result) {
            $message = $sth->errorInfo()[2];    // Error Message
            $code = $sth->errorInfo()[0];       // SQLSTATE
            if ($code != 0) {
                throw new DAOException($message, $code);
            }
        }
        
        return $result;
    }

    /**
     * Function delete
     * Generate a DELETE FROM query to delete an object from a table
     *
     * @param object $object
     *
     * @return bool true if query succeded
     */
    public function delete(&$object)
    {
        $id = $object->getId();

        $query  = "DELETE FROM `{$this->table}`" . PHP_EOL;
        $query .= "WHERE `id` = :id;";
        
        $dbh = $this->getConnexion();
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id", $id);
        $result = $sth->execute();
        $this->closeConnexion();
        
        if (!$result) {
            $message = $sth->errorInfo()[2];    // Error Message
            $code = $sth->errorInfo()[0];       // SQLSTATE
            if ($code != 0) {
                throw new DAOException($message, $code);
            } else {
                unset($object);
            }
        }
        
        return $result;
    }
}
?>