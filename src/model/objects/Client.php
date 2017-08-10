<?php
namespace gsb_prospects\model\objects;

use \InvalidArgumentException;
use \OutOfBoundsException;
use gsb_prospects\model\objects\Praticien;
use gsb_prospects\model\objects\Prestation;

final class Client extends Praticien {
    /**
     * @var Prestation $lesPrestations
     */
    private $id_Praticien;
    private $lesPrestations;

    public function __construct($id, $nom, $prenom, $adresse, $id_Ville = 0, $id_Type_Praticien = 0)
    {
        parent::__construct($id, $nom, $prenom, $adresse, $id_Ville, $id_Type_Praticien);
        $this->lesPrestations = array();
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

    public function removePrestation($prestation)
    {
        if(is_int($prestation)) {
            // $prestation is an index
            $index = $prestation;
            // checking index
            $isset = isset($this->lesPrestations[$prestation]);
            if($isset === false) {
                throw new OutOfBoundsException("index out of bounds");
            } else {
                // removing element and resorting keys
                array_splice($this->lesPrestations, $index, 1);
            }
        } elseif ($prestation instanceof Prestation) {
            // $prestation is an instance
            $instance = $prestation;
            // searching instance
            $index = array_search($instance, $this->lesPrestations, true);
            if ($index === false) {
                throw new InvalidArgumentException("instance not found");    
            } else {
                // removing element and resorting keys
                array_splice($this->lesPrestations, $index, 1);
            }
        } else {
            // $prestation is neither an index nor an instance
            throw new InvalidArgumentException("parameter must be an index or an instance of Prestation");
        }
    }
}