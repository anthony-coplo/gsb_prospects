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

        $objects = $praticienDAO->findAll();

        $view = new View("Praticien_List");
        $view->bind("title", "Liste des Praticiens");
        $view->bind("objectName", "praticien");
        $view->bind("objectNamePlural", "praticiens");
        $view->bind("objects", $objects);
        $view->display();
    }
}