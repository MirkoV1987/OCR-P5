<?php

namespace Framework;

class View
{

    private $vars = array();

    public function render($view)
    {
       ob_start();

       foreach($this->vars as $key => $value) {

       $$key = $value;
        
       }
        
       require_once($view);

       ob_end_flush();
    }

    public function set($name, $value)
    {
     $this->vars[$name] = $value;
    }

    public function redirect($url)
    {
     header("Location: $url"); 
     //exit;
    }

}
