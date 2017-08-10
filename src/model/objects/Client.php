<?php
namespace gsb_prospects\model\objects;

use gsb_prospects\model\objects\Praticien;
use gsb_prospects\model\objects\Prestation;

final class Client extends Praticien {
    /**
     * @var Prestation $lesPrestations
     */
    private $lesPrestations;

    public function __construct($id, $nom, $prenom, $adresse)
    {
        parent::__construct($id, $nom, $prenom, $adresse);
        $lesPrestations = array();
    }

    public function getPrestations(): array
    {
        return $this->lesPrestations;
    }

    public function setPrestations(array $array)
    {
        $this->lesPrestations = $array;
    }

    public function addPrestation(Prestation $instance)
    {
        $this->lesPrestations[] = $instance;
    }

    public function removePrestation(mixed $prestation)
    {
        if(is_int($prestation)) {
            // index
            if(isset($this->lesPrestations[$prestation])) {
                throw new OutOfBoundsException("index out of bounds");
            }
            unset($this->lesPrestations[$prestation]);
        } elseif ($prestation instanceof Prestation) {
            // object
        } else {
            throw new InvalidArgumentException("parameter must be int or an instance of Prestation");
        }
    }
}