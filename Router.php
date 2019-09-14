<?php

namespace MirkoV1987\Framework;

class Router 
{
    public function routingRequest()
    {
       try
       {
        $request = new Request($request);
        $controller = $this->createController($request);
        $action = $this->createAction($request); 
        $controller->executeAction($action); //TO DO: fonction executeAction à écrire dans le contrôleur 
       } 
       catch (\Exception $e)
       {
        $this->error($e);
       }
    }
    /**
     * 
     * @param \Exception $exception gestion de l'erreur
     */
    private function error(\Exception $exception)
    {
        $view = new View("Error");
        $view->generate(array("error message"=> $exception->getMessage())); 
    }
    //Création des noms des fichiers des contrôleurs
    $classController = $controller.'Controller';
    $fileController = 'Controller/'.$classController.'.php';  
    
    /**
     * 
     * @param Request $request création du contrôleur de la requête
     */
    private function createController(Request $request) 
    {
        
        //Controller par défaut; 
        $controller = "Home";
        
        if ($request->existsParameter('controller'))
        {
          $controller = $request->getParameter('controller');
        }
        //Vérifie si le fichier 'controller' existe  
        if (file_exists($fileController))
        {
          //Appel du fichier du contrôleur adapté à la requête  
          require_once($fileController);
          $controller = new $classController;
          $this->setRequest($request);
          return $this;
        }
        else
        {
           throw new \Exception("Le fichier '$fileController' est introuvable");
        }
    }
    //Attribue l'action en fonction de la requête reçue
    private function createAction(Request $request)
    {
          
       //action par défaut; 
       $action = "index";
       //Si le paramètre indiqué dans la requête existe, appeler la fonction 'getParameter'
       if ($request->existsParameter($action))
       {
          $action = $request->getParameter($action);
       }
        
        return $action; //valeur renvoyée
    }
} 


