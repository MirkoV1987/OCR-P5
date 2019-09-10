<?php


namespace MirkoV1987\Framework

class Session 
{
   
   /**
    * La session démarre 
    */

   public function __construct() 
   {

      session_start();

   }

   /**
    * La session est détruite
    */

   public function destroy()
   {

      session_destroy();

   }

   /**
    * Ajoute un attribut à la session
    * @param string $name nom de l'attrinut
    * @param string $value valeur de l'attribut 
    */

   public function setAttribute($name, $value)
    {

      $name =  htmlspecialchars($name);
      $value = htmlspecialchars($value);
      $_SESSION[$name] = $value;
      
    } 

   /**
    * Vérifie si l'attribut existe et renvoie un bool (true|false)
    * @param string $name nom de l'attribut
    * @return bool renvoi Vrai si l'attribut existe
    */

    public function existsAttribute($name)
    {

        return (isset($_SESSION[$name]) && $_SESSION[$name] !='');

    }

    /**
     * Renvoie la valeur de l'attribut demandé
     * @param string $name nom de l'attribut
     * @param string $value valeur de l'attribut
     * @param \Exception si l'attribut n'est pas présent dans 
     */

    public function getAttribute($name, $value)
    {

        if ($this->existsAttribute($name))
        {    
            return $_SESSION[$name];         }
        }
        else
        {
             throw new \Exception("L'attribut '$name' n'existe pas dans la session");      
        }

    }

}
