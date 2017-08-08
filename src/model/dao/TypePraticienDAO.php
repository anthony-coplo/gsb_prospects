<?php
namespace gsb_prospects\model\dao;

use \PDO;
use gsb_prospects\kernel\NotImplementedException;
use gsb_prospects\model\objects\TypePraticien;

final class TypePraticienDAO extends AbstractDAO implements IDAO {
    private $tablename = "type_praticien";

    public function delete($object)
    {
        throw new NotImplementedException();
    }

    public function find($id)
    {
        $dbh = $this->getConnexion();

        $query = "SELECT * FROM `{$this->tablename}`
                  WHERE `id` = :id;";
        
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id", $id);
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "gsb_prospects\model\objects\TypePraticien", array("id", "code", "libelle", "lieu"));
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

        $query = "SELECT * FROM `{$this->tablename}`;";
        
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "gsb_prospects\model\objects\TypePraticien", array("id", "code", "libelle", "lieu"));
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

    public function insert($object)
    {
        throw new NotImplementedException();
    }

    public function update($object)
    {
        throw new NotImplementedException();
    }
}