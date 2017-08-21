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

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/parameters.php';

use gsb_prospects\controller\ClientController;
use gsb_prospects\controller\PraticienController;
use gsb_prospects\controller\ProspectController;

//$praticienController = new PraticienController();
//$praticienController->defaultAction();

$prospectController = new ProspectController();
$prospectController->defaultAction();

//$clientController = new ClientController();
//$clientController->defaultAction();