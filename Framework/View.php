<?php

namespace Framework;

class View
{
    private $file;
    private $title;
    private $vars = array();

    public function __construct($action) 
    {
     $this->file = 'View/'.$view.'.php';
    }

    public function generate($data)
    {
        $content = $this->generateFile($this->file, $data);

        $view = $this->generateFile('View/'.$folder.'/'.'template.php', array('title' => $this->title, 'content' => $content) );
        
        echo $view;
    }

    //Génère un fichier view et renvoie le résultat
    private function generateFile($file, $data)
    {
          if (file_exists($file) )
          {
           extract($data);

           ob_start();

           require $file;

           return ob_get_clean();
          }
          else
               throw new Exception('Fichier '.$file.' introuvable');
    }

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
     exit;
    }

}
