<?php

namespace Framework;

use Controllers;

class Router
{ 
    // private $control;
    // private $view;
    
    public function routingRequest()
    {
	    
	try
        {

            $url = "";
         
            if (isset($_GET['url']) ) {
               
            $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL) );
                
            $method = 'index';

            if (isset($url[1]) ) {
                  
            $method = $url[1];

         }
		   
            $params = [];

            if (isset($url[2])) {
                  
            $params['get'] = array_slice($url, 2);

             }
               
             if (isset($_POST)) {

             $params['post'] = $_POST;

             }
        
               $this->createController($url[0], $method, $params);   
           
            }        
            else {

               $this->createController('post','index', []);
                
            }

        }
        catch(Exception $e)
        {
            $errorMsg = $e->getMessage();
            require_once('View/errorView.php');        
        }

    }

    private function createController($class, $method, $params)
    {   
        $request = new Request($params); //on crée un nouvel objet Request

           if ($request->existsParams('controller') ) {
               
            $controller = $request->getParams('controller');
            $controller = ucfirst($controller);

           }

           $controller = ucfirst(strtolower($class));
           $classController = '\\Controllers\\'.$controller."Controller";
       
           $control = new $classController;
           $control->$method($params);

           // }
        
            // else {
            // header("HTTP/1.0 404 Not Found");  
            // require_once('View/404.php'); //Créer HTML et include avec require_once
            // exit; 

            //}

      }

} 
