<?php
namespace gsb_prospects\model\dao;

use \PDO;
use gsb_prospects\kernel\NotImplementedException;
use gsb_prospects\model\objects\TypePraticien;

final class TypePraticienDAO extends AbstractDAO implements iDAO {
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
            print($sth->errorInfo()[2] . PHP_EOL);
            throw new \Exception();
        }

        return $object;
    }

    public function findAll()
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