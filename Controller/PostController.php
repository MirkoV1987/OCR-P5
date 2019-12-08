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
      $this->set('posts', $posts);
      $this->render('view/index.php');
   }

   public function view($params)
   {
      $extract = explode('-', $params['get'][0]);
      $id = intval($extract[0]);

      if (!empty($params['get'][0]) && isset($_SESSION['user']['role']) ) {

      $user = $_SESSION['user']['role'];

         if (isset($_SESSION['user']['role']) == 1 || $_SESSION['user']['role'] == 2) {

         $post = $this->manager->getPost($id); 
         $comments = $this->commentManager->getComment($id); 
         $this->set('comments', $comments);
         $this->set('post', $post);
         $this->render('view/post/connectedView.php');
         exit;

         }
      
      }

      $post = $this->manager->getPost($id); 
      $comments = $this->commentManager->getComment($id); 
      $this->set('comments', $comments);
      $this->set('post', $post);
      $this->render('view/post/view.php');
      
   }

   //=================Gestion des posts par l'Admin==========================//
   
   public function add($params)
   {
      if (!empty($params['post']) ) { 

         if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] == 2) {

         $post = $this->manager->add($params);
         $this->redirect('/OCR-P5/admin/index');
   
         }          

      }  
      
      $this->render('view/post/add.php');

   }

   public function update($params)
   {
      if ($_SESSION['user']['role'] != 2) {

      $this->redirect('/OCR-P5');

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
      if ($_SESSION['user']['role'] != 2) {

      $this->redirect('/OCR-P5');

      }

      $post = $this->manager->delete($params);
      $view = $this->redirect('/OCR-P5/admin');

   }

}   
