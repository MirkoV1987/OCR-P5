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
        if (empty(\Framework\Session::getSession()->getKey('user')['role'])) {
            $this->render("View/user/login.php");
        }

        if (\Framework\Session::getSession()->getKey('user')['role'] != 2) {
            $this->render("View/user/login.php");
        }

        $this->set('user', \Framework\Session::getSession()->getKey('user'));

        if (\Framework\Session::getSession()->getKey('user')['role'] == 1) {
            $this->render("View/post/ConnectedView.php");
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

        $usersManager = new \Manager\UserManager();
        $users = $usersManager->getList();
        $this->set('users', $users);

       
        $this->render('View/admin/index.php');
    }
}
