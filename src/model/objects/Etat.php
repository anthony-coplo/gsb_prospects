<?php
/**
 * File :        Etat.php
 * Location :    gsb_prospects/src/model/objects/Etat.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\model\objects;

/**
 * Class Etat
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class Etat extends AbstractObject
{
    /**
     * Properties
     *
     * @var int    $id
     * @var string $nom
     */
    private $id;
    private $nom;

    /* Methods */

    /**
     * __construct
     *
     * @param int    $id  id
     * @param string $nom nom
     */
    public function __construct($id, string $nom)
    {
        $this->id  = $id;
        $this->nom = $nom;
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
}