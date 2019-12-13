<?php 

namespace Controllers;

use \Manager;
use \Framework;

class CommentController extends \Framework\Controller
{
   
   private $manager;
   private $view; 

   public function __construct()
   {
      $this->manager = new \Manager\CommentManager;
   }  

   public function index($params)
   {
      if (empty($params)) {

      $comments = $this->manager->getList();

      } else {

      $comments = $this->manager->getList($params['get'][0]); 

      }
     
   }

   public function view($params)
   {
      print_r($params);
      $extract = explode('-', $params['get'][0]);
      $post_id = intval($extract[0]);

      $comments = $this->manager->getComment($post_id);
      $this->set('comments', $comments);
      $this->set('post', $post);

      $user = $_SESSION['user']['role'];

      if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 2) {

      $comments = $this->manager->getComment($post_id);
      $this->set('comments', $comments);
      $this->set('post', $post);

      $this->render('view/post/connectedView.php');

      }
      
      $this->render('view/post/view.php');
      
   }

   public function add($params)
   {
      if (!empty($params['post']) && isset($_SESSION['user']['role']) ) {

      $comment = $this->manager->add($params);
      $post_id = $params['get'][0]; 
      $this->redirect('/OCR-P5/post/view/'.$post_id);
  
      }

      $this->redirect('/OCR-P5/post/view/'.$post_id);

   }

   public function validate($params)
   {
      if ($_SESSION['user']['role'] == 2) {

      $extract = explode('-', $params['get'][0]);
      $post_id = $params['get'][0];
      $comment = $this->manager->validate($post_id);
      $this->redirect('/OCR-P5/admin/index');

      }

      $this->redirect('/OCR-P5');

   }

   public function delete($params)
   {
      if ($_SESSION['user']['role'] != 2) {

      $this->redirect('/OCR-P5/post');
 
      }

      $comment = $this->manager->delete($params);
      $view = $this->redirect('/OCR-P5/admin');
   }

}   
