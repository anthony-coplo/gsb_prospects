<?php
/**
 * File :        index.php
 * Location :    gsb_prospects/src/index.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects;

use gsb_prospects\kernel\Route;
use gsb_prospects\kernel\Router;
use gsb_prospects\view\View;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/parameters.php';

use gsb_prospects\controller\ClientController;
use gsb_prospects\controller\PraticienController;
use gsb_prospects\controller\ProspectController;

// 1st level route definition
$router = new Router();
$router->addRoute(new Route("/", "DefaultController"));
$router->addRoute(new Route("/accueil", "DefaultController"));
$router->addRoute(new Route("/praticiens", "PraticienController"));
$router->addRoute(new Route("/praticien/{slug}", "PraticienController"));
$router->addRoute(new Route("/prospects", "ProspectController"));
$router->addRoute(new Route("/prospect/{slug}", "ProspectController"));
$router->addRoute(new Route("/clients", "ClientController"));
$router->addRoute(new Route("/client/{slug}", "ClientController"));
$route = $router->findRoute();
if ($route) {
    $route->execute();
} else {
    print("<p>Page inconnue.</p>" . PHP_EOL);
}