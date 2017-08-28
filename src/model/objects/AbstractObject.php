<?php
/**
 * PHP version 7.0
 * gsb_prospects/src/model/objects/AbstractObject.php
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */

namespace gsb_prospects\model\objects;

use \InvalidArgumentException;

/**
 * Class AbstractObject
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
abstract class AbstractObject
{
    public function get_object_vars()
    {
        return get_object_vars($this);
    }
}