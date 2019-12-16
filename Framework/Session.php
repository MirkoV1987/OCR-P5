<?php

namespace Framework;

class Session
{
    public function __construct()
    {
        session_start();
    }
 
    public function destroy()
    {
        session_destroy();
    }

    public function setAttribute($name, $value)
    {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        $_SESSION[$name] = $value;
    }
  
    public function existsAttribute($name)
    {
        return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
    }

    public function getAttribute($name)
    {
        if ($this->existsAttribute($name)) 
        {
        return $_SESSION[$name];
        }
        else 
        {
        throw new \Exception("Attribut '$name' absent de la session");
        }
    }
}