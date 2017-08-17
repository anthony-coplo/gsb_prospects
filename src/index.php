<?php
namespace gsb_prospects;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/parameters.php';

//include "view/index.html";

use gsb_prospects\controller\PraticienController;
use gsb_prospects\Project;

$praticienController = new PraticienController();
$praticienController->defaultAction();