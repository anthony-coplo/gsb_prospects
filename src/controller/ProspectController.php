<?php
/**
 * File :        ProspectController.php
 * Location :    gsb_prospects/src/controller/ProspectController.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\controller;

use gsb_prospects\model\dao\ProspectDAO;
use gsb_prospects\model\objects\Prospect;
use gsb_prospects\view\View;

/**
 * Class ProspectController
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class ProspectController
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
        $ProspectDAO = new ProspectDAO();

        $objects = $ProspectDAO->findAll();

        $view = new View("Prospect_List");
        $view->bind("title", "Liste des Prospects");
        $view->bind("objectName", "prospect");
        $view->bind("objectNamePlural", "prospects");
        $view->bind("objects", $objects);
        $view->display();
    }
}