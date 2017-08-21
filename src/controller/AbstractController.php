<?php
/**
 * File :        AbstractController.php
 * Location :    gsb_prospects/src/controller/AbstractController.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\controller;

use gsb_prospects\view\View;

/**
 * Class AbstractController
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
abstract class AbstractController
{
    private $_view;
    private $_dao;

    /**
     * __construct must initialize _view and _dao
     */
    abstract function __construct();
}