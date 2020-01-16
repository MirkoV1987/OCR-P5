<?php

namespace Framework;

use Controllers;

class Router
{
    public function routingRequest()
    {
        try {
            $url = "";
         
            if (isset($_GET['url'])) {
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                
                $method = 'index';

                if (isset($url[1])) {
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

            $this->createController('post', 'index', []);
        } catch (Exception $e) {
            $e->getMessage();
            require_once('View/404.php');
        }
    }

    private function createController($class, $method, $params)
    {
        $controller = ucfirst(strtolower($class));
        $classController = '\\Controllers\\'.$controller."Controller";

        if (class_exists($classController) ) {
            $control = new $classController;
            $control->$method($params);
        } else {
            require_once('View/404.php'); 
            exit;
        }
    }
}
