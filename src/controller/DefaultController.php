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
        $this->_view = null;
        $this->_dao = null;
    }

    /**
     * Procedure defaultAction
     *
     * @return void
     */
    public function defaultAction()
    {
        // 2nd level route definition
        $router = new Router();
        $router->addRoute(new Route("/", "DefaultController", "accueilAction", "accueil"));
        $router->addRoute(new Route("/accueil", "DefaultController", "accueilAction", "accueil"));
        $route = $router->findRoute();
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
        $view = new View("Accueil");
        $view->bind("title", "Accueil");
        $view->display();
    }
}