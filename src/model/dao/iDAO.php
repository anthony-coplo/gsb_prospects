<?php
/**
 * File :        IDAO.php
 * Location :    gsb_prospects/src/model/dao/IDAO.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\model\dao;

/**
 * Interface IDAO
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
interface IDAO
{
    function delete($object);   // delete an object from database
    function find($id);         // find   an object by id
    function findAll();         // find all objects from database
    function insert(&$object);   // add    an object in   database
    function update($object);   // update an object in   database
}
?>