<?php
/**
 * File :        PraticienController.php
 * Location :    gsb_prospects/src/controller/PraticienController.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\controller;

use gsb_prospects\model\dao\PraticienDAO;
use gsb_prospects\model\objects\Praticien;
use gsb_prospects\model\dao\TypePraticienDAO;
use gsb_prospects\model\objects\TypePraticien;
use gsb_prospects\model\dao\VilleDAO;
use gsb_prospects\model\objects\Ville;
use gsb_prospects\view\View;

/**
 * Class PraticienController
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class PraticienController
{
    /**
     * Procedure defaultAction
     *
     * @return void
     */
    public function defaultAction()
    {
        $this->listAction();
    }

    /**
     * Procedure listAction
     *
     * @return void
     */
    public function listAction()
    {
        $praticienDAO = new PraticienDAO();
        $typePraticienDAO = new TypePraticienDAO();
        $villeDAO = new VilleDAO();

        $objects = $praticienDAO->findAll();
        foreach ($objects as $object) {
            $id = $object->getId();
            $ville = $villeDAO->findFromPraticien($id);
            $object->setVille($ville);
            $typePraticien = $typePraticienDAO->findFromPraticien($id);
            $object->setTypePraticien($typePraticien);
        }

        $view = new View("Praticien_List");
        $view->bind("title", "Liste des Praticiens");
        $view->bind("objects", $objects);
        $view->display();
    }
}