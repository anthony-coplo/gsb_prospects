<?php
/**
 * File :        Prospect.php
 * Location :    gsb_prospects/src/model/objects/Prospect.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\model\objects;

use gsb_prospects\model\objects\Praticien;
use gsb_prospects\model\objects\Etat;

/**
 * Class Prospect
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class Prospect extends Praticien
{
    /**
     * Properties
     *
     * @var int    $id_Praticien
     * @var int    $id_Etat
     * @var object $lEtat
     */
    private $id_Praticien;
    private $id_Etat;
    private $lEtat;

    /* Methods */

    /**
     * __construct
     *
     * @param int    $id_Praticien      id_Praticien
     * @param int    $id_Etat           id_Etat
     * @param int    $id                id
     * @param string $nom               nom
     * @param string $prenom            prenom
     * @param string $adresse           adresse
     * @param int    $id_Ville          id_Ville (default:null)
     * @param int    $id_Type_Praticien id_Type_Praticien (default:null)
     */
    public function __construct($id_Praticien, $id_Etat, $id, string $nom, string $prenom, string $adresse, $id_Ville = null, $id_Type_Praticien = null)
    {
        parent::__construct($id, $nom, $prenom, $adresse, $id_Ville, $id_Type_Praticien);
        $this->id_Praticien = $id_Praticien;
        $this->id_Etat = $id_Etat;
        $this->lEtat   = null;
    }

    /**
     * Function getIdPraticien
     *
     * @return int
     */
    public function getIdPraticien()
    {
        return $this->id_Praticien;
    }

    /**
     * Function getIdEtat
     *
     * @return int
     */
    public function getIdEtat()
    {
        return $this->id_Etat;
    }

    /**
     * Function getEtat
     *
     * @return int
     */
    public function getEtat()
    {
        return $this->lEtat;
    }

    /**
     * Procedure setEtat
     *
     * @param object $instance instanceof Etat
     *
     * @return void
     */
    public function setEtat(Etat $instance)
    {
        $this->lEtat = $instance;
    }
}