<?php 

namespace Controllers;

use \Manager;
use \Framework;

class PostController extends \Framework\Controller
{

   private $manager;

   public function __construct()
   {
      $this->manager = new \Manager\PostManager;
      $this->commentManager = new \Manager\CommentManager;
      $this->userManager = new \Manager\UserManager;
   }  

   public function index()
   {
      $posts = $this->manager->getList();
      $this->set('posts', $posts);
      $this->render('view/index.php');
   }

   public function view($params)
   {
      $extract = explode('-', $params['get'][0]);
      $id = (int)($extract[0]);

      if ($params['get'][0] && \Framework\Session::getSession()->getKey('user')['role'] )  {

         if (\Framework\Session::getSession()->getKey('user')['role'] == 1 
            || \Framework\Session::getSession()->getKey('user')['role'] == 2) {

         $post = $this->manager->getPost($id); 
         $comments = $this->commentManager->getComment($id); 
         $this->set('comments', $comments);
         $this->set('post', $post);
         $this->render('view/post/connectedView.php');

         }

         return false;
      
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

         if (!empty(\Framework\Session::getSession()->getKey('user')['role'] ) 
            || \Framework\Session::getSession()->getKey('user')['role'] == 2) {

         $this->manager->add($params);
         $this->redirect('/OCR-P5/admin/index');
   
         }          

      }  
      
      $this->render('view/post/add.php');

   }

   public function update($params)
   {
      if (\Framework\Session::getSession()->getKey('user')['role'] != 2) {

      $this->redirect('/OCR-P5');

      }

      if (!empty($params['post']) ) {

      $post = $this->manager->update($params);
      $this->redirect('/OCR-P5/admin/index');

      }  

      $postId = $params['get'][0];
      $post = $this->manager->getPost($postId);
      $this->set('post', $post);
      $this->render('View/post/update.php');

   }

   public function delete($params)
   {
      if (\Framework\Session::getSession()->getKey('user')['role'] != 2) {

      $this->redirect('/OCR-P5');

      }

      $this->manager->delete($params);
      $this->redirect('/OCR-P5/admin');

   }

}   