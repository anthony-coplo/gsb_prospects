<?php
namespace gsb_prospects\model\objects;

use gsb_prospects\model\objects\Praticien;
use gsb_prospects\model\objects\Etat;

final class Prospect extends Praticien {
    /**
     * @var Etat $lEtat
     */
    private $lEtat;

    public function __construct($id, $nom, $prenom, $adresse)
    {
        parent::__construct($id, $nom, $prenom, $adresse);
        $lEtat = null;
    }

    public function getEtat(): array
    {
        return $this->lEtat;
    }

    public function setEtat(Etat $instance)
    {
        $this->lEtat = $instance;
    }
}