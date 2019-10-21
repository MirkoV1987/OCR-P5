<?php 

require_once('Manager/CommentManager.php');
//require_once('Framework/Controller.php');

class CommentController //extends Controller
{
   
   private $manager;
   private $view; 


   public function __construct()
   {
      $this->manager = new CommentManager;
   }  

   public function index()
   {
      $comments = $this->manager->getList();
      require_once("View/commentView.php");
      //header('Location: /OCR-P5/comment/view');
   }

   public function view($params)
   {
      $extract = explode('-', $params['get'][0]);
      $commentId = intval($extract[0]);
      $comment = $this->manager->getComment($commentId);
      header('Location: /OCR-P5/comment');
   }

   public function add($params)
   {
      $comment = $this->manager->add($params);
      header('Location: /OCR-P5/comment');
   }

   public function update($params)
   {
      $comment= $this->manager->update($params);
      header('Location: /OCR-P5/comment');
   }

   public function delete($params)
   {
      print_r($params);
      $comment = $this->manager->delete($params);
      header('Location: /OCR-P5/comment');
   }

}   
