<?php
namespace gsb_prospects\model\dao;

use \PDO;
use gsb_prospects\kernel\NotImplementedException;
use gsb_prospects\model\objects\TypePraticien;

final class TypePraticienDAO extends AbstractDAO implements IDAO {
    protected $table = "type_praticien";
    protected $class = "gsb_prospects\model\objects\TypePraticien";
    protected $fields = array("id", "code", "libelle", "lieu");

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