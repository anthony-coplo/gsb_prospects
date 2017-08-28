<?php
/**
 * File :        Client.php
 * Location :    gsb_prospects/src/model/objects/Client.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\model\objects;

use \InvalidArgumentException;
use \OutOfBoundsException;
use gsb_prospects\model\objects\Praticien;
use gsb_prospects\model\objects\Prestation;

/**
 * Class Client
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class Client extends Praticien
{
    /**
     * Properties
     * 
     * @var int   $id_Praticien
     * @var array $lesPrestations
     */
    private $id_Praticien;
    private $lesPrestations;

    /* Methods */
    
    /**
     * __construct
     *
     * @param int    $id_Praticien      id_Praticien
     * @param int    $id                id
     * @param string $nom               nom
     * @param string $prenom            prenom
     * @param string $adresse           adresse
     * @param int    $id_Ville          id_ville (default:null)
     * @param int    $id_Type_Praticien id_type_praticien (default:null)
     */
    public function __construct($id_Praticien, $id, string $nom, string $prenom, string $adresse, $id_Ville = null, $id_Type_Praticien = null)
    {
        parent::__construct($id, $nom, $prenom, $adresse, $id_Ville, $id_Type_Praticien);
        $this->id_Praticien = $id_Praticien;
        $this->lesPrestations = [];
    }

    /**
     * Function getIdPraticien
     *
     * @return int
     */
    public function getIdPraticien()
    {
        return $this->id_Praticien;
    }

    /**
     * Function getPrestations
     *
     * @return array
     */
    public function getPrestations(): array
    {
        return $this->lesPrestations;
    }

    /**
     * Procedure setPrestations
     *
     * @param array $array Prestations
     *
     * @return void
     */
    public function setPrestations(array $array)
    {
        $this->lesPrestations = $array;
    }

    /**
     * Procedure addPrestation
     *
     * @param object $instance Prestation
     *
     * @return void
     */
    public function addPrestation(Prestation $instance)
    {
        $this->lesPrestations[] = $instance;
    }

    /**
     * Procedure removePrestation
     *
     * @param mixed $prestation int or instanceof Prestation
     *
     * @return void
     */
    public function removePrestation($prestation)
    {
        if (is_int($prestation)) {
            // $prestation is an index
            $index = $prestation;
            // checking index
            $isset = isset($this->lesPrestations[$prestation]);
            if ($isset === false) {
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