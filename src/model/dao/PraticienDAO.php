<?php
namespace gsb_prospects\model\dao;

use \PDO;
use gsb_prospects\kernel\NotImplementedException;
use gsb_prospects\model\objects\Praticien;

final class PraticienDAO extends AbstractDAO implements IDAO {
    protected $table = "praticien";
    protected $class = "gsb_prospects\model\objects\Praticien";
    protected $fields = array("id", "nom", "prenom", "adresse", "id_Ville", "id_Type_Praticien");

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