<?php


namespace MirkoV1987\Framework


class Request
{

   //Déclaration des attributs 
   private $parameters;

   private $session;


   //Déclaration des méthodes
   public function __construct($parameters)
   {



   }

   public function getSession($name)
   {
    return $this->session;
   }


   //la valeur renvoyée est un bool (true|false)
   public function existsParameter($name)
   {
    return (!empty($this->parameters[$name]));
   }


   //renvoie la valeur du paramètre
   public function getParameter($name)
   {

      if ($this->existsParameter($name))
      {
        return htmlspecialchars($this->parameters[$name]);
      }
      else
      {
             throw new \Exception ("Le paramètre '$name' est introuvable");
      }

   }

}
