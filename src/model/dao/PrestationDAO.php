<?php
namespace gsb_prospects\model\dao;

use \PDO;
use \ReflectionClass;
use gsb_prospects\kernel\NotImplementedException;
use gsb_prospects\model\objects\Prestation;

final class PrestationDAO extends AbstractDAO implements IDAO {
    protected $table = "prestation";
    protected $class = "gsb_prospects\model\objects\Prestation";
    protected $fields = array("id", "nom");

    public function findFromClient($id)
    {
        $dbh = $this->getConnexion();
        
        $query  = "SELECT prestation.* FROM `{$this->table}`" . PHP_EOL;
        $query .= $this->join([
            [ "Type"=>"Inner", "Table"=>"interesser", "Foreign Table"=>"interesser", "Foreign Key"=>["id_Prestation"], "Primary Table"=>"prestation", "Primary Key"=>["id"] ],
        ]);
        $query .= "WHERE `id_Client` = :id;";
            
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id", $id);
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