<?php 

require_once('Manager/PostManager.php');
require_once('Manager/CommentManager.php');
require_once('Manager/UserManager.php');
require_once('Framework/Controller.php');
require_once('Framework/View.php');

class PostController extends Controller
{
   
   private $manager;
   private $view; 


   public function __construct()
   {
      $this->manager = new PostManager;
      $this->commentManager = new CommentManager;
      $this->userManager = new UserManager;
   }  

   public function index($params)
   {
      $posts = $this->manager->getList();
      require_once("view/index.php");
      //$this->render("View/template/index.php");
      //$view = $this->executeAction("homeView.php");
      //exit;
   }

   public function view($params)
   {
      $extract = explode('-', $params['get'][0]);
      $id = intval($extract[0]);

      if (empty($params['get'][0]) ) {
         print_r($post); 
         header('location: /OCR-P5/post');
      } 
      $post = $this->manager->getPost($id); 
      $comments = $this->commentManager->getComment($id); 
      $user = $this->userManager->getUser($id);
 
      $this->set('user', $user);
      $this->set('post', $post);
      $this->set('comments', $comments);
      $this->render('view/post/view.php');
      
   }

   public function count()
   {
      $line = $this->manager->count(array('numberPosts'));
      $view = $this->executeAction("index");
   }

   //=================Gestion des posts par l'Admin==========================//
   
   public function add($params)
   {
      if(!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] != 2) {

         echo "Vous n'êtes pas ADMIN";
 
      }

      if (!empty($params['post']) ) {

         $post = $this->manager->add($params);

         $this->redirect('/OCR-P5/admin/index');

      }  
      
      $this->render('view/post/add.php');

   }

   public function update($params)
   {
      if($_SESSION['user']['role'] != 2) {

         header('location: /OCR-P5/');

      }

      if (!empty($params['post']) ) {

         $post = $this->manager->update($params);
         $this->redirect('/OCR-P5/admin/index');

      }  

      $postId = $params['get'][0];
      $post = $this->manager->getPost($postId);
      $this->set('post', $post);
      $view = $this->render('View/post/update.php');

   }

   public function delete($params)
   {
      if($_SESSION['user']['role'] != 2) {

         header('location: /OCR-P5/post');

      }

      $post = $this->manager->delete($params);
      $view = $this->redirect('/OCR-P5/admin');

   }

}   
