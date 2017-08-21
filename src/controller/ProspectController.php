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

use gsb_prospects\kernel\Route;
use gsb_prospects\kernel\Router;
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
     * __construct
     */
    public function __construct()
    {
        $this->_dao = new ProspectDAO();
        $this->_router = new Router();
        // 2nd level route definition
        $this->_router->addRoute(new Route("/prospects", "ProspectController", "listAction", "prospect_list"));
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
        $view = new View("Prospect_List");
        $view->bind("title", "Liste des Prospects");
        $view->bind("objectName", "prospect");
        $view->bind("objectNamePlural", "prospects");

        $basePath = $this->_router->getBasePath();
        $view->bind("basePath", $basePath);

        $objects = $this->_dao->findAll();
        $view->bind("objects", $objects);

        $view->display();
    }
}