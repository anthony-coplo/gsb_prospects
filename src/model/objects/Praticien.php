<?php
namespace gsb_prospects\model\objects;

use gsb_prospects\model\objects\Ville;
use gsb_prospects\model\objects\TypePraticien;

final class Praticien {
    /**
     * @var int    $id
     * @var string $nom
     * @var string $prenom
     * @var string $adresse
     * @var Ville $laVille
     * @var TypePraticien $leTypePraticien
     */
    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $laVille;
    private $leTypePraticien;

    public function __construct($id, $nom, $prenom, $adresse)
    {
            $this->id              = $id;
            $this->nom             = $nom;
            $this->prenom          = $prenom;
            $this->adresse         = $adresse;
            $this->laVille         = null;
            $this->leTypePraticien = null;
    }

    public function getId(): int
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