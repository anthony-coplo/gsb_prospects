<?php
namespace gsb_prospects\model\objects;

final class Ville {
    /**
     * @var int    $id
     * @var string $nom
     * @var string $code_postal
     */
    private $id;
    private $nom;
    private $code_postal;

    public function __construct($id, $nom, $code_postal)
    {
        $this->id         = $id;
        $this->nom        = $nom;
        $this->code_postal = $code_postal;
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

    public function getCodePostal(): string
    {
        return $this->code_postal;
    }

    /**
     * @param string $value
     */
    public function setCodePostal(string $value)
    {
        $this->code_postal = $value;
    }
}