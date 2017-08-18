<?php
/**
 * File :        VilleDAO.php
 * Location :    gsb_prospects/src/model/dao/VilleDAO.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\model\dao;

use \PDO;
use gsb_prospects\kernel\NotImplementedException;
use gsb_prospects\model\objects\Ville;

/**
 * Class VilleDAO
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class VilleDAO extends AbstractDAO implements IDAO
{
    protected $table = "Ville";
    protected $class = "gsb_prospects\model\objects\Ville";
    protected $fields = [ "id", "nom", "code_postal" ];

    public function findFromPraticien($id)
    {
        $dbh = $this->getConnexion();
        
        $query  = "SELECT `{$this->table}`.* FROM `{$this->table}`" . PHP_EOL;
        $query .= $this->join(
            [
                [ "Type"=>"Inner", "Table"=>"praticien", "Foreign Table"=>"praticien", "Foreign Key"=>["id_Ville"], "Primary Table"=>"Ville", "Primary Key"=>["id"] ],
            ]
        );
        $query .= "WHERE `praticien`.`id` = :id;";
            
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id", $id);
        $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->class, $this->fields);
        $sth->execute();

        $object = $sth->fetch();

        $this->closeConnexion();

        if ($object === false) {
            $message = $sth->errorInfo()[2];    // Error Message
            $code = $sth->errorInfo()[0];       // SQLSTATE
            if ($code != 0) {
                throw new DAOException($message, $code);
            }
        }

        return $object;
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