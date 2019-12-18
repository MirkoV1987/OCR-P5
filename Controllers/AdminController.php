<?php

namespace Controllers;

use \Manager;
use \Framework;

class AdminController extends \Framework\Controller
{

private $userManager;

    public function __construct()
    {
      $this->userManager = new \Manager\UserManager();
      $this->postManager = new \Manager\PostManager();
    } 

    public function index() 
    {
    
        if (empty(\Framework\Session::getSession('user') ) ) { 

            $this->render("view/user/login.php");

        }

        if (filter_var(\Framework\Session::getSession()->getKey('user')['role'] ) != 2) { 

            $this->render("view/user/index.php");

        }

        if (filter_var(\Framework\Session::getSession()->getKey('user')['role'] ) == 1) { 

            $this->render("view/post/ConnectedView.php");

        }

        /*============Gestion des posts============*/

        $postManager = new \Manager\PostManager();
        $posts = $postManager->getList();
        $this->set('posts', $posts);

        /*============Gestion des commentaires============*/
        
        $commentManager = new \Manager\CommentManager();
        $comments = $commentManager->getList();
        $this->set('comments', $comments);

        /*============Gestion des utilisateurs============*/

        $userManager = new \Manager\UserManager();
        $users = $userManager->getList();
        $this->set('users', $users);

        $userManager = new \Manager\UserManager();
        $extract = explode('-', ['get'][0]);
        //$id = intval($extract[0]);
        $id = (int)($extract[0]);
        $user = $userManager->getUser($id);
        $this->set('user', $user);

       
        $this->render('view/admin/index.php');  
              
    }

}