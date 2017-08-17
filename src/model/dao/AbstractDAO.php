<?php
namespace gsb_prospects\model\dao;

use \PDOException;
use \PDO;

abstract class AbstractDAO {
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

    private $connexion;

    protected function getConnexion() {
        try {
            $connexion = new PDO(self::DSN, self::USER, self::PASSWORD);
        } catch (PDOException $e) {
            print("<p>PDOException {$e->getCode()}</p>" . PHP_EOL);
            print("<p>{$e->getMessage()}</p>" . PHP_EOL);
            die();
        }
        return $connexion;
    }

    protected function closeConnexion() {
        $connexion = null;
    }

    protected function join($joinedTables = []): string
    {
        // Structure : [ "Type"=>"", "Table"=>"", "Foreign Table"=>"", "Foreign Key"=>[], "Primary Table"=>"", "Primary Key"=>[] ]

        if (empty($joinedTables)) {
            $joinedTables = $this->joinedTables;
        }

        $str = "";
        foreach($joinedTables as $join) {
            // default join type
            if(!isset($join['Type'])) {
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
            for($index = 0; $index < $count; $index++) {
                if($index != 0) {
                    $str .= " AND ";
                }
                $str .= "`{$join['Foreign Table']}`.`{$join['Foreign Key'][$index]}` = `{$join['Primary Table']}`.`{$join['Primary Key'][$index]}`";
            }
            $str .= PHP_EOL;
        }
        return $str;
    }

    public function find($id)
    {
        $dbh = $this->getConnexion();

        $query  = "SELECT * FROM `{$this->table}`" . PHP_EOL;
        if(! empty($this->joinedTables)) {
            $query .= $this->join();
        }
        $query .= "WHERE `id` = :id;";
        
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id", $id);
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->class, $this->fields);
        $sth->execute();

        $object = $sth->fetch();

        $this->closeConnexion();

        if(! $object){
            $message = $sth->errorInfo()[2];    // Error Message
            $code = $sth->errorInfo()[0];       // SQLSTATE
            if($code == 0 && empty($message)) {
                $message = "unknown id $id";
            }
            throw new DAOException($message, $code);
        }

        return $object;
    }

    public function findAll()
    {
        $dbh = $this->getConnexion();

        $query = "SELECT * FROM `{$this->table}`;" . PHP_EOL;
        if(! empty($this->joinedTables)) {
            $query .= $this->join();
        }
        $query .= ";";
        
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->class, $this->fields);
        $sth->execute();

        $objects = $sth->fetchAll();

        $this->closeConnexion();

        if(! $objects){
            $message = $sth->errorInfo()[2];    // Error Message
            $code = $sth->errorInfo()[0];       // SQLSTATE
            if ($code != 0){
                throw new DAOException($message, $code);
            }
        }

        return $objects;
    }
}
?>