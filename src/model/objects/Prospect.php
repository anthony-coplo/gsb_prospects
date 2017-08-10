<?php
namespace gsb_prospects\model\objects;

use gsb_prospects\model\objects\Praticien;
use gsb_prospects\model\objects\Etat;

final class Prospect extends Praticien {
    /**
     * @var Etat $lEtat
     */
    private $id_Etat;
    private $lEtat;

    public function __construct($id, $nom, $prenom, $adresse, $id_Ville = 0, $id_Type_Praticien = 0, $id_Etat = 0)
    {
        parent::__construct($id, $nom, $prenom, $adresse, $id_Ville, $id_Type_Praticien);
        $this->id_Etat = $id_Etat;
        $this->lEtat   = null;
    }

    public function getIdEtat()
    {
        return $this->id_Etat;
    }

    public function getEtat()
    {
        return $this->lEtat;
    }

    public function setEtat(Etat $instance)
    {
        $this->lEtat = $instance;
    }
}