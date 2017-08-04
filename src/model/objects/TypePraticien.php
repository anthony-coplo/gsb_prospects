<?php
declare(strict_types=1);

namespace gsb_prospects\model\objects;

final class TypePraticien {
    /**
     * @var string $code
     * @var string $libelle
     * @var string $lieu
     */
    private $code;
    private $libelle;
    private $lieu;

    public function __construct(string $code, string $libelle, string $lieu)
    {
        $this->code = $code;
        $this->libelle = $libelle;
        $this->lieu = $lieu;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $value
     */
    public function setCode(string $value)
    {
        $this->code = $value;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * @param string $value
     */
    public function setLibelle(string $value)
    {
        $this->libelle = $value;
    }

    public function getLieu(): string
    {
        return $this->lieu;
    }

    /**
     * @param string $value
     */
    public function setLieu(string $value)
    {
        $this->lieu = $value;
    }

}