<?php
/**
 * File :        View.php
 * Location :    gsb_prospects/src/view/View.php
 * PHP Version : 7.0
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
namespace gsb_prospects\view;

/**
 * Class View
 * 
 * @author  David RIEHL <david.riehl@ac-lille.fr>
 * @license GPL 3.0
 */
final class View
{
    /**
     * Properties
     *
     * @var array  $_vars array of vars
     * @var string $_filename template file name
     */
    private $_vars;
    private $_filename;

    /* Methods */

    /**
     * __construct
     *
     * @param string $filename template file name
     */
    public function __construct(string $filename)
    {
        $this->_vars = [];
        $this->_filename = $filename;
    }

    /**
     * Procedure bind
     *
     * @param string $name  var name
     * @param mixed  $value value
     * 
     * @return void
     */
    public function bind($name, $value)
    {
        $this->_vars[$name] = $value;
    }

    /**
     * Procedure display
     *
     * @return void
     */
    public function display()
    {
        include "view/templates/{$this->_filename}.html";
    }

    /**
     * __get
     *
     * @param string $name name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->_vars[$name];
    }

    /**
     * __isset
     *
     * @param string $name name
     *
     * @return mixed
     */
    public function __isset($name)
    {
        return isset($this->_vars[$name]);
    }
}