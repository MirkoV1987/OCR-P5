<?php 

namespace Controllers;

use \Manager;
use \Framework;

class PostController extends \Framework\Controller
{

   private $manager;
   private $view; 

   public function __construct()
   {
      $this->manager = new \Manager\PostManager;
      $this->commentManager = new \Manager\CommentManager;
      $this->userManager = new \Manager\UserManager;
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