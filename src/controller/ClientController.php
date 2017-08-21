<?php
/**
 * File :        ClientController.php
 * Location :    gsb_prospects/src/controller/ClientController.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\controller;

use gsb_prospects\model\dao\ClientDAO;
use gsb_prospects\model\objects\Client;
use gsb_prospects\view\View;

/**
 * Class ClientController
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class ClientController
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
        $ClientDAO = new ClientDAO();

        $objects = $ClientDAO->findAll();

        $view = new View("Client_List");
        $view->bind("title", "Liste des Clients");
        $view->bind("objectName", "client");
        $view->bind("objectNamePlural", "clients");
        $view->bind("objects", $objects);
        $view->display();
    }
}