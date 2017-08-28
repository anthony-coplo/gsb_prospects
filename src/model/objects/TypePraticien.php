<?php
/**
 * File :        TypePraticien.php
 * Location :    gsb_prospects/src/model/objects/TypePraticien.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\model\objects;

/**
 * Class TypePraticien
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class TypePraticien extends AbstractObject
{
    /**
     * Properties
     *
     * @var int    $id
     * @var string $code
     * @var string $libelle
     * @var string $lieu
     */
    private $id;
    private $code;
    private $libelle;
    private $lieu;

    /* Methods */

    /**
     * __construct
     *
     * @param int    $id      id
     * @param string $code    code
     * @param string $libelle libelle
     * @param string $lieu    lieu
     */
    public function __construct($id, string $code, string $libelle, string $lieu)
    {
        $this->id      = $id;
        $this->code    = $code;
        $this->libelle = $libelle;
        $this->lieu    = $lieu;
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
     * Function getCode
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Procedure setCode
     *
     * @param string $value value
     *
     * @return void
     */
    public function setCode(string $value)
    {
        $this->code = $value;
    }

    /**
     * Function getLibelle
     *
     * @return string
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * Procedure setLibelle
     *
     * @param string $value value
     *
     * @return void
     */
    public function setLibelle(string $value)
    {
        $this->libelle = $value;
    }

    /**
     * Function getLieu
     *
     * @return string
     */
    public function getLieu(): string
    {
        return $this->lieu;
    }

    /**
     * Procedure setLieu
     *
     * @param string $value value
     *
     * @return void
     */
    public function setLieu(string $value)
    {
        $this->lieu = $value;
    }
}