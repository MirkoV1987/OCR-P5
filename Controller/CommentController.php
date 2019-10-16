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
      require_once("View/homeView.php");
   }

   public function view($params)
   {
      //print_r($params);
      $extract = explode('-', $params['get'][0]);
      //print_r($extract);
      $postId = intval($extract[0]);
      $post = $this->manager->getPost($postId);
      require_once("View/postView.php");
   }

   public function add($params)
   {
      print_r($params);
      $post = $this->manager->add($params);
      require_once("View/homeView.php");
   }

   public function update()
   {
      $post = $this->manager->update();
      require_once("View/homeView.php");  
   }

   public function delete($params)
   {
      print_r($params);
      $post = $this->manager->delete($params);
      require_once("View/homeView.php");
   }

}   