<?php
namespace gsb_prospects;

require __DIR__ . '/../vendor/autoload.php';

//include "view/index.html";

use gsb_prospects\controller\PraticienController;

$praticienController = new PraticienController();
$praticienController->defaultAction();