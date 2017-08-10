<?php
namespace gsb_prospects\model\objects;

final class Ville {
    /**
     * @var int    $id
     * @var string $nom
     * @var string $codePostal
     */
    private $id;
    private $nom;
    private $codePostal;

    public function __construct($id, $nom, $codePostal)
    {
        $this->id         = $id;
        $this->nom        = $nom;
        $this->codePostal = $codePostal;
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

    public function getCodePostal(): string
    {
        return $this->codePostal;
    }

    /**
     * @param string $value
     */
    public function setCodePostal(string $value)
    {
        $this->codePostal = $value;
    }
}