<?php
namespace gsb_prospects\view;

final class View {
    private $vars;
    private $filename;

    public function __construct($filename)
    {
        $this->vars = [];
        $this->filename = $filename;
    }

    public function bind($name, $value)
    {
        $this->vars[$name] = $value;
    }

    public function display()
    {
        include "view/templates/{$this->filename}.html";
    }

    public function __get($name)
    {
        return $this->vars[$name];
    }
}