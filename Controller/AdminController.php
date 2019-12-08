<?php

require_once('Manager/UserManager.php');
require_once('Manager/PostManager.php');
require_once('Manager/CommentManager.php');
require_once('Model/User.php');
require_once('Model/Post.php');
require_once('Framework/Controller.php');

class AdminController extends Controller
{

private $userManager;
private $successMsg;
private $errorMsg;

    public function __construct()
    {
      $this->userManager = new UserManager();
      $this->postManager = new PostManager();
    } 

    public function index() 
    {
        if (!isset($_SESSION['user']) ) {

            $this->render("view/user/login.php");

        }

        if ($_SESSION['user']['role'] != 2) { 

            $this->render("view/user/index.php");

        }

        if ($_SESSION['user']['role'] == 1) { 

            $this->render("view/post/ConnectedView.php");

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

        $userManager = new UserManager();
        $users = $userManager->getList();
        $this->set('users', $users);

        $userManager = new UserManager();
        $extract = explode('-', ['get'][0]);
        $id = intval($extract[0]);
        $user = $userManager->getUser($id);
        $this->set('user', $user);

       
        $this->render('view/admin/index.php');  
              
    }

}
