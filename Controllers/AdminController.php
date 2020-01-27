<?php

namespace Controllers;

use Manager\UserManager;
use Manager\PostManager;
use Manager\CommentManager;
use Framework\View;
use Framework\Session;

class AdminController extends View
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->postManager = new PostManager();
    }

    public function index()
    {
        if (empty(Session::getSession()->getKey('user')['role'])) {
            $this->render("View/user/login.php");
        }

        if (Session::getSession()->getKey('user')['role'] != 2) {
            $this->render("View/user/login.php");
        }

        $this->set('user', Session::getSession()->getKey('user'));

        if (Session::getSession()->getKey('user')['role'] == 1) {
            $this->render("View/post/ConnectedView.php");
        }

        /*============Gestion des posts============*/

        $postManager = new PostManager();
        $posts = $postManager->getList();
        $this->set('posts', $posts);

        /*============Gestion des commentaires============*/
        
        $commentManager = new CommentManager();
        $comments = $commentManager->getList();
        $this->set('comments', $comments);

        /*============Gestion des utilisateurs============*/

        $usersManager = new UserManager();
        $users = $usersManager->getList();
        $this->set('users', $users);

       
        $this->render('View/admin/index.php');
    }
}
