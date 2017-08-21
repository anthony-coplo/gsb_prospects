<?php
/**
 * File :        DefaultController.php
 * Location :    gsb_prospects/src/controller/DefaultController.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\controller;

use gsb_prospects\kernel\Route;
use gsb_prospects\kernel\Router;
use gsb_prospects\view\View;

/**
 * Class DefaultController
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class DefaultController extends AbstractController implements iController
{
    /**
     * __construct
     */
    public function __construct()
    {
        $this->_dao = null;
        $this->_router = new Router();
        // 2nd level route definition
        $this->_router->addRoute(new Route("/", "DefaultController", "accueilAction"));
        $this->_router->addRoute(new Route("/accueil", "DefaultController", "accueilAction"));
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
     * Procedure accueilAction
     *
     * @return void
     */
    public function accueilAction()
    {
        $basePath = $this->_router->getBasePath();

        $view = new View("Accueil");
        $view->bind("title", "Accueil");
        $view->bind("basePath", $basePath);
        $view->display();
    }
}