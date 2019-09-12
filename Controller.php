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
     * Execute l'action
     * 
     * @throws \Exception s'il y a une erreur
     */

    public function executeAction($action) 
    {

  


    }




     
 }