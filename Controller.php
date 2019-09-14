<?php


 namespace MirkoV1987\Framework


 abstract class Controller 
 {
     
     /**action*/
    private $action;

     /**requête*/
    protected $request;

     
    public function setRequest(Request $request)
    {
     $this->request = $request;
    }

    /**
     * Exécute l'action
     * 
     * @throws \Exception erreur si l'action n'existe pas dans la classe Controller
     */

    public function executeAction($action) 
    {

        if (method_exists($this, $action)) //Vérifie si un méthode nommée $action existe dans la classe
        {

         $this->action = $action;
         $this->{$this->action}(); //Appel de la méthode nommée $action

        }
        else
        {

         $classController = get_class($this);
         throw new \Exception ("Action '$action' non définie dans la classe '$classController'")  

        }

    }

    /**
     * Action par défaut index()
     * La méthode abstraite oblige les classes dérivées à l'implémenter
     */

    public abstract function index();

    /**
     * 
     * Génération de la vue associée au controleur avec la méthode generateView()
     * @param $dataView stocke dans un tableau les données pour la génération de la vue  
     *  
     * */
    
     protected function generateView($dataView = array())
     {
        //Détermine le nom du fichier vue à partir du nom du controleur
        $classController = get_class($this);
        $controller = str_replace("Controller", "", $classController);
        $view = new View($this->action, $controller);
        $view->generate($dataView);         

     }

     /**
      * Redirige vers un controleur et une action spécifiques 
      *
      * @param string $controller Controller
      * @param string $action Action
      */

      protected function redirect($controller, $action = null)
      {

       $rootWeb = Config::get("rootWeb", "/");
       //Création de l'URL racine_site/controller/action
       header("Location:".$rootWeb.$controller."/".$action);
       
      }

     
 }