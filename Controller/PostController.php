<?php 

require_once('Manager/PostManager.php');
//require_once('Framework/Controller.php');

class PostController //extends Controller
{
   
   private $manager;
   private $view; 


   public function __construct()
   {
      $this->manager = new PostManager;
   }  

   public function index()
   {
      $posts = $this->manager->getList();
      require_once("View/homeView.php");
   }

   public function view($params)
   {
      $extract = explode('-', $params['get'][0]);
      $postId = intval($extract[0]);
      $post = $this->manager->getPost($postId);
      require_once("View/postView.php");
   }

   public function add($params)
   {
      $post = $this->manager->add($params);
      header('Location: /OCR-P5/post');
   }

   public function update($params)
   {
      $post = $this->manager->update($params); 
      header('Location: /OCR-P5/post'); 
   }

   public function delete($params)
   {
      $post = $this->manager->delete($params);
      header('Location: /OCR-P5/post');
   }

}   
