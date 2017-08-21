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

use gsb_prospects\kernel\Route;
use gsb_prospects\kernel\Router;
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
     * __construct
     */
    public function __construct()
    {
        $this->_dao = new ClientDAO();
        $this->_router = new Router();
        // 2nd level route definition
        $this->_router->addRoute(new Route("/clients", "ClientController", "listAction", "client_list"));
    }

    /**
     * Procedure defaultAction
     *
     * @return void
     */
    public function defaultAction()
    {
        $route = $this->_router->findRoute();
        if ($route) {
            $route->execute();
        } else {
            print("<p>Page inconnue.</p>" . PHP_EOL);
        }
    }
 
    /**
     * Procedure listAction
     *
     * @return void
     */
    public function listAction()
    {
        $view = new View("Client_List");
        
        $view->bind("title", "Liste des Clients");
        $view->bind("objectName", "client");
        $view->bind("objectNamePlural", "clients");

        $basePath = $this->_router->getBasePath();
        $view->bind("basePath", $basePath);

        $objects = $this->_dao->findAll();
        $view->bind("objects", $objects);

        $view->display();
    }
}