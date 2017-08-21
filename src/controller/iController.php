<?php
/**
 * File :        iController.php
 * Location :    gsb_prospects/src/controller/iController.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\controller;
 
 
 /**
  * Interface iController
  * 
  * @author  David RIEHL <david.riehl@ac-lille.fr>
  * @license GPL 3.0
  */
interface IController
{
    /**
     * Procedure defaultAction
     * 2nd level route definition
     *
     * @return void
     */
    public function defaultAction();
}
?>