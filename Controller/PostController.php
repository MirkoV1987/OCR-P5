<?php 

require_once('Manager/PostManager.php');
require_once('Manager/CommentManager.php');
require_once('Framework/Controller.php');

class PostController extends Controller
{
   
   private $manager;
   private $view; 


   public function __construct()
   {
      $this->manager = new PostManager;
   }  

   public function index($params)
   {
      $posts = $this->manager->getList();
      require_once("View/homeView.php");
      //$view = $this->executeAction("homeView.php");
   }

   public function view($params)
   {
      $extract = explode('-', $params['get'][0]);
      $id = intval($extract[0]);
      $post = $this->manager->getPost($id);
      require_once("View/postView.php");
   }

   public function add($params)
   {
      $post = $this->manager->add($params);
      $view = $this->executeAction("index");
   }

   public function update($params)
   {
      $post = $this->manager->update($params); 
      $view = $this->executeAction("index");
   }

   public function delete($params)
   {
      $post = $this->manager->delete($params);
      $view = $this->executeAction("index");
   }

   public function count()
   {
      $line = $this->manager->count(array('numberPosts'));
      $view = $this->executeAction("index");
   }

}   
