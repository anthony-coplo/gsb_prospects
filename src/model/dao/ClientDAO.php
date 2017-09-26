<?php
/**
 * PHP version 7.0
 * gsb_prospects/src/model/dao/ClientDAO.php
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\model\dao;

use \PDO;
use \ReflectionClass;
use gsb_prospects\kernel\NotImplementedException;
use gsb_prospects\model\objects\Client;

/**
 * Class ClientDAO
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class ClientDAO extends AbstractDAO implements IDAO
{
    protected $table = "client";
    protected $joinedTables = [
        [ "Type"=>"Inner", "Table"=>"praticien", "Foreign Table"=>"client", "Foreign Key"=>["id_praticien"], "Primary Table"=>"praticien", "Primary Key"=>["id"] ],
    ];
    protected $class = "gsb_prospects\model\objects\Client";
    protected $fields = [
        "id_Praticien", "id", "nom", "prenom", "adresse", "id_Ville", "id_Type_Praticien"
    ];
    
    public function delete(&$object)
    {
        throw new NotImplementedException();
    }

    public function findAll()
    {
        $dbh = $this->getConnexion();

        $query  = "SELECT * FROM `{$this->table}`" . PHP_EOL;
        if (! empty($this->joinedTables)) {
            $query .= $this->join();
        }
        
        $sth = $dbh->prepare($query);
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

    public function insert(&$object)
    {
        throw new NotImplementedException();
    }

    public function update($object)
    {
        throw new NotImplementedException();
    }
}