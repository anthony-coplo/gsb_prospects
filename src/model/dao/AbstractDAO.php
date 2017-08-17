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
    protected $joinedTables   = [];
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
        if (empty($joinedTables)) {
            $joinedTables = $this->joinedTables;
        }
        $str = "";
        foreach($joinedTables as $join) {
            $str .= "INNER JOIN `{$join['table']}` ON ";
            $count_FK = count($join["FK"]);
            $count_PK = count($join["PK"]);
            $count = ($count_FK <= $count_PK) ? $count_FK: $count_PK;
            for($index = 0; $index < $count; $index++) {
                if($index != 0) {
                    $str .= " AND ";
                }
                $str .= "`{$this->table}`.`{$join['FK'][$index]}` = `{$join['table']}`.`{$join['PK'][$index]}`";
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