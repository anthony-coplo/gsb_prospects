<?php
/**
 * File :        PraticienDAO.php
 * Location :    gsb_prospects/src/model/dao/PraticienDAO.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\model\dao;

use \PDO;
use gsb_prospects\kernel\NotImplementedException;
use gsb_prospects\model\objects\Praticien;

/**
 * Class PraticienDAO
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class PraticienDAO extends AbstractDAO implements IDAO
{
    protected $table = "praticien";
    protected $class = "gsb_prospects\model\objects\Praticien";
    protected $fields = [ 
        "id", "nom", "prenom", "adresse", "id_Ville", "id_Type_Praticien" 
    ];
}