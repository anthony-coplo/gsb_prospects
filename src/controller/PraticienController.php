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

use gsb_prospects\kernel\Route;
use gsb_prospects\kernel\Router;
use gsb_prospects\model\dao\PraticienDAO;
use gsb_prospects\model\objects\Praticien;
use gsb_prospects\view\View;

/**
 * Class PraticienController
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class PraticienController extends AbstractController implements iController
{
    /**
     * __construct
     */
    public function __construct()
    {
        $this->_dao = new PraticienDAO();
        $this->_router = new Router();
        // 2nd level route definition
        $this->_router->addRoute(new Route("/praticiens", "PraticienController", "listAction", "praticien_list"));
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
        $view = new View("Praticien_List");

        $view->bind("title", "Liste des Praticiens");
        $view->bind("objectName", "praticien");
        $view->bind("objectNamePlural", "praticiens");

        $basePath = $this->_router->getBasePath();
        $view->bind("basePath", $basePath);

        $objects = $this->_dao->findAll();
        $view->bind("objects", $objects);

        $view->display();
    }
}