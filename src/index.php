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

//include "view/index.html";

use gsb_prospects\controller\PraticienController;
use gsb_prospects\Project;

$praticienController = new PraticienController();
$praticienController->defaultAction();