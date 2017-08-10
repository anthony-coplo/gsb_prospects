<?php
namespace gsb_prospects\model\objects;

final class Prestation {
    /**
     * @var int    $id
     * @var string $nom
     */
    private $id;
    private $nom;

    public function __construct($id, $nom)
    {
        $this->id  = $id;
        $this->nom = $nom;
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
}