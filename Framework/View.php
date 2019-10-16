<?php

class View
{
    private $file;
    private $t;

    public function __construct($action) 
    {
        $this->file = 'View/'.$action.'View.php';
    }

    //Génère et affiche la vue
    public function generate($data)
    {
        $content = $this->generateFile($this->file, $data);

        //Template
        $view = $this->generateFile('View/template.php', array('t' => $this->t, 'content' => $content));
        
        echo $view;
    }

    //Génère un fichier view et renvoie le résultat
    private function generateFile($file, $data)
    {
          if(file_exists($file))
          {
              extract($data);

              ob_start();

              //On inclut le fichier view
              require $file;

              return ob_get_clean();
          }
          else
               throw new Exception('Fichier '.$file.' introuvable');
    }


}