<?php   
   
use \Framework;

//require("Router.php");

abstract class Controller 
{
     
    protected $action; // Action à réaliser      
    protected $request; // Requête entrante
        
    // Mémorisation de la requête entrante
    public function setRequest($request)
    {
        $this->$request = $request;
    }
        
    // Action à réaliser
    public function executeAction()
    {
        if (method_exists($this, $action)) // Verifie si une méthode qui se nomme $action existe dans la classe actuelle.
		{
			$this->action = $action;
			$this->{$this->action}(); // Appel de la méthode dont le nom est $action
		}
		else 
		{
			$classController = get_class($this);
			throw new \Exception("Action '$action' non définie dans la classe $classController");
		}
    }
        
    /*
    Méthode abstraite correspondant à l'action par défaut
    Oblige les classes dérivées à implémenter cette action par défaut
    */
    //public abstract function index();
        
    // Génère la vue associée au contrôleur courant
    protected function generateView($dataView = array())
    {
        // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
        $classController = get_class($this);
        // instanciation de la vue
        $view = new View($classController);
        // lancement de la vue
        $view->generate($dataView);
    }
        
}