<?php
namespace gsb_prospects\model\objects;

final class TypePraticien {
    /**
     * @var int    $id
     * @var string $code
     * @var string $libelle
     * @var string $lieu
     */
    private $id;
    private $code;
    private $libelle;
    private $lieu;
/*
    public function __construct()
    {
        if(func_num_args() == 0) {
            $this->id      = 0;
            $this->code    = "";
            $this->libelle = "";
            $this->lieu    = "";
        } else {
            $id = func_get_arg(0);
            $code  = func_get_arg(1);
            $libelle = func_get_arg(2);
            $lieu = func_get_arg(3);

            $this->id      = $id;
            $this->code    = $code;
            $this->libelle = $libelle;
            $this->lieu    = $lieu;
        }
    }*/

    public function __construct($id, $code, $libelle, $lieu)
    {
            $this->id      = intval($id);
            $this->code    = $code;
            $this->libelle = $libelle;
            $this->lieu    = $lieu;
    }

    public function getId(): int
    {
        return $this->id;
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