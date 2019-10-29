<?php 

require_once('Manager/CommentManager.php');
require_once('Framework/Controller.php');

class CommentController extends Controller
{
   
   private $manager;
   private $view; 

   public function __construct()
   {
      $this->manager = new CommentManager;
   }  

   public function index($params)
   {
      if (empty($params)) {

         $comments = $this->manager->getList();

      } else {

         $comments = $this->manager->getList($params['get'][0]); 

      }
      require_once("View/commentView.php");
      //header('Location: /OCR-P5/comment/index');
   }

   public function view($params)
   {
      $extract = explode('-', $params['get'][0]);
      $commentId = intval($extract[0]);
      $comment = $this->manager->getComment($commentId);
      require_once("View/CommentUpdate.php");
      //header('Location: /OCR-P5/comment/view');
   }

   public function add($params)
   {
      $comment = $this->manager->add($params);
      $view = $this->executeAction("index");
   }

   public function update($params)
   {
      $comment= $this->manager->update($params);
      $view = $this->executeAction("index");
   }

   public function delete($params)
   {
      $comment = $this->manager->delete($params);
      $view = $this->executeAction("index");
   }

} 
