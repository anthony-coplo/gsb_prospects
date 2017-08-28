<?php
/**
 * File :        Praticien.php
 * Location :    gsb_prospects/src/model/objects/Praticien.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\model\objects;

use gsb_prospects\model\dao\VilleDAO;
use gsb_prospects\model\objects\Ville;
use gsb_prospects\model\objects\TypePraticien;

/**
 * Class Praticien
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
class Praticien extends AbstractObject
{
    /**
     * Properties
     *
     * @var int    $id
     * @var string $nom
     * @var string $prenom
     * @var string $adresse
     * @var object $laVille
     * @var object $leTypePraticien
     */
    protected $id;
    protected $nom;
    protected $prenom;
    protected $adresse;
    protected $id_Ville;
    protected $laVille;
    protected $id_Type_Praticien;
    protected $leTypePraticien;

    /* Methods */

    /**
     * __construct
     *
     * @param int    $id                id
     * @param string $nom               nom
     * @param string $prenom            prenom
     * @param string $adresse           adresse
     * @param int    $id_Ville          id_Ville (default:null)
     * @param int    $id_Type_Praticien id_Type_Praticien (default:null)
     */
    public function __construct($id, $nom, $prenom, $adresse, $id_Ville = null, $id_Type_Praticien = null)
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

    /**
     * Function getId
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Procedure setId
     *
     * @param string $value value
     *
     * @return void
     */
    public function setId(string $value)
    {
        $this->id = $value;
    }
 
    /**
     * Function getNom
     * 
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Procedure setNom
     *
     * @param string $value value
     *
     * @return void
     */
    public function setNom(string $value)
    {
        $this->nom = $value;
    }

    /**
     * Function getPrenom
     *
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * Procedure setPrenom
     *
     * @param string $value value
     *
     * @return void
     */
    public function setPrenom(string $value)
    {
        $this->prenom = $value;
    }

    /**
     * Function getAdresse
     *
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * Procedure setAdresse
     *
     * @param string $value value
     *
     * @return void
     */
    public function setAdresse(string $value)
    {
        $this->adresse = $value;
    }

    /**
     * Function getIdVille
     *
     * @return int
     */
    public function getIdVille()
    {
        return $this->id_Ville;
    }

    /**
     * Function getVille
     *
     * @return object
     */
    public function getVille()
    {
        if ($this->id_Ville != null && $this->laVille == null) {
            $villeDAO = new VilleDAO();
            $this->laVille = $villeDAO->findFromPraticien($this->id);
        }
        return $this->laVille;
    }

    /**
     * Procedure setVille
     *
     * @param object $instance instanceof Ville
     *
     * @return void
     */
    public function setVille(Ville $instance)
    {
        $this->laVille = $instance;
    }

    /**
     * Function getIdTypePraticien
     *
     * @return int
     */
    public function getIdTypePraticien()
    {
        return $this->id_Type_Praticien;
    }

    /**
     * Function getTypePraticien
     *
     * @return object
     */
    public function getTypePraticien()
    {
        return $this->leTypePraticien;
    }

    /**
     * Procedure setTypePraticien
     *
     * @param object $instance instanceof TypePraticien
     *
     * @return void
     */
    public function setTypePraticien(TypePraticien $instance)
    {
        $this->leTypePraticien = $instance;
    }
}