<?php
namespace gsb_prospects\model\dao;

use \PDO;
use \ReflectionClass;
use gsb_prospects\kernel\NotImplementedException;
use gsb_prospects\model\objects\Prospect;

final class ProspectDAO extends AbstractDAO implements IDAO {
    protected $table = "prospect";
    protected $joinedTables = [
        ["FK" => ["id_praticien"], "table" => "praticien", "PK" => ["id"]],
    ];
    protected $class = "gsb_prospects\model\objects\Prospect";
    protected $fields = array("id_Praticien", "id_Etat", "id", "nom", "prenom", "adresse", "id_Ville", "id_Type_Praticien");
    
    public function findAll()
    {
        $dbh = $this->getConnexion();

        $query  = "SELECT * FROM `{$this->table}`" . PHP_EOL;
        if(! empty($this->joinedTables)) {
            $query .= $this->join();
        }
        
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();

        $array = $sth->fetchAll();

        $this->closeConnexion();

        if($array === false){
            $message = $sth->errorInfo()[2];    // Error Message
            $code = $sth->errorInfo()[0];       // SQLSTATE
            if ($code != 0){
                throw new DAOException($message, $code);
            }
        } else {
            $objects = [];
            foreach($array as $row) {
                $reflectedClass = new ReflectionClass($this->class);
                $object = $reflectedClass->newInstanceArgs($row);
                $objects[] = $object;
            }
        }

        return $objects;
    }

    public function delete($object)
    {
        throw new NotImplementedException();
    }

    public function insert($object)
    {
        throw new NotImplementedException();
    }

    public function update($object)
    {
        throw new NotImplementedException();
    }
}