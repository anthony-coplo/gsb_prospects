<?php
/**
 * File :        Ville.php
 * Location :    gsb_prospects/src/model/objects/Ville.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
 namespace gsb_prospects\model\objects;

/**
 * Class Ville
 *
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class Ville
{
    private $id;
    private $nom;
    private $code_postal;

    /**
     * Constructeur
     *
     * @param int    $id          id
     * @param string $nom         nom
     * @param string $code_postal code postal
     */
    public function __construct($id, $nom, $code_postal)
    {
        $this->id         = $id;
        $this->nom        = $nom;
        $this->code_postal = $code_postal;
    }

    /**
     * Fonction getId
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Fonction getNom
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
     * @param string $value nom
     *
     * @return void
     */
    public function setNom(string $value)
    {
        $this->nom = $value;
    }

    /**
     * Fonction getCodePostal
     *
     * @return string
     */
    public function getCodePostal(): string
    {
        return $this->code_postal;
    }

    /**
     * Procedure setCodePostal
     *
     * @param string $value code postal
     *
     * @return void
     */
    public function setCodePostal(string $value)
    {
        $this->code_postal = $value;
    }
}