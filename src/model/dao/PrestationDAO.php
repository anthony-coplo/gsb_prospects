<?php
/**
 * File :        PrestationDAO.php
 * Location :    gsb_prospects/src/model/dao/PrestationDAO.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\model\dao;

use \PDO;
use \ReflectionClass;
use gsb_prospects\kernel\NotImplementedException;
use gsb_prospects\model\objects\Prestation;

/**
 * Class PrestationDAO
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class PrestationDAO extends AbstractDAO implements IDAO
{
    protected $table = "prestation";
    protected $class = "gsb_prospects\model\objects\Prestation";
    protected $fields = [ "id", "nom" ];

    public function findAllFromClient($id)
    {
        $dbh = $this->getConnexion();
        
        $query  = "SELECT prestation.* FROM `{$this->table}`" . PHP_EOL;
        $query .= $this->join(
            [
                [ "Type"=>"Inner", "Table"=>"interesser", "Foreign Table"=>"interesser", "Foreign Key"=>["id_Prestation"], "Primary Table"=>"prestation", "Primary Key"=>["id"] ],
            ]
        );
        $query .= "WHERE `id_Client` = :id;";
            
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id", $id);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();

        $array = $sth->fetchAll();

        $this->closeConnexion();

        if ($array === false) {
            $message = $sth->errorInfo()[2];    // Error Message
            $code = $sth->errorInfo()[0];       // SQLSTATE
            if ($code != 0) {
                throw new DAOException($message, $code);
            }
        } else {
            $objects = [];
            foreach ($array as $row) {
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

    public function update($object)
    {
        throw new NotImplementedException();
    }
}