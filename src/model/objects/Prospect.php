<?php
namespace gsb_prospects\model\objects;

use gsb_prospects\model\objects\Praticien;
use gsb_prospects\model\objects\Etat;

final class Prospect extends Praticien {
    /**
     * @var int $id_Praticien
     * @var int $id_Etat
     * @var Etat $lEtat
     */
    private $id_Praticien;
    private $id_Etat;
    private $lEtat;

    public function __construct($id_Praticien = 0, $id_Etat = 0, $id, $nom, $prenom, $adresse, $id_Ville = 0, $id_Type_Praticien = 0)
    {
        parent::__construct($id, $nom, $prenom, $adresse, $id_Ville, $id_Type_Praticien);
        $this->id_Praticien = $id_Praticien;
        $this->id_Etat = $id_Etat;
        $this->lEtat   = null;
    }

    public function getIdPraticien()
    {
        return $this->id_Praticien;
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