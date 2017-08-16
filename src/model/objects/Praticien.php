<?php
namespace gsb_prospects\model\objects;

use gsb_prospects\model\objects\Ville;
use gsb_prospects\model\objects\TypePraticien;

class Praticien {
    /**
     * @var int    $id
     * @var string $nom
     * @var string $prenom
     * @var string $adresse
     * @var Ville $laVille
     * @var TypePraticien $leTypePraticien
     */
    protected $id;
    protected $nom;
    protected $prenom;
    protected $adresse;
    protected $id_Ville;
    protected $laVille;
    protected $id_Type_Praticien;
    protected $leTypePraticien;

    public function __construct($id, $nom, $prenom, $adresse, $id_Ville = 0, $id_Type_Praticien = 0)
    {
        $this->id                = $id;
        $this->nom               = $nom;
        $this->prenom            = $prenom;
        $this->adresse           = $adresse;
        $this->id_Ville          = $id_Ville;
        $this->laVille           = null;
        $this->id_Type_Praticien = $id_Type_Praticien;
        $this->leTypePraticien   = null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $value
     */
    public function setNom(string $value)
    {
        $this->nom = $value;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $value
     */
    public function setPrenom(string $value)
    {
        $this->prenom = $value;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @param string $value
     */
    public function setAdresse(string $value)
    {
        $this->adresse = $value;
    }

    public function getIdVille()
    {
        return $this->id_Ville;
    }

    public function getVille(): Ville
    {
        return $this->laVille;
    }

    /**
     * @param Ville $instance
     */
    public function setVille(Ville $instance)
    {
        $this->laVille = $instance;
    }

    public function getIdTypePraticien()
    {
        return $this->id_Type_Praticien;
    }

    public function getTypePraticien(): TypePraticien
    {
        return $this->leTypePraticien;
    }

    /**
     * @param TypePraticien $instance
     */
    public function setTypePraticien(TypePraticien $instance)
    {
        $this->leTypePraticien = $instance;
    }
}