<?php

namespace Controllers;

use Manager\UserManager;
use Manager\PostManager;
use Manager\CommentManager;
use Framework\View;
use Framework\Session;

class PostController extends View
{
    private $manager;

    public function __construct()
    {
        $this->manager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
    }

    public function index()
    {
        $posts = $this->manager->getList();
        $this->set('posts', $posts);
        $this->render('View/index.php');
    }

    public function view($params)
    {
        $this->set('user', Session::getSession()->getKey('user'));
        $extract = explode('-', $params['get'][0]);
        $id = (int)($extract[0]);

        $post = $this->manager->getPost($id);
        $comments = $this->commentManager->getComment($id);
        $this->set('comments', $comments);
        $this->set('post', $post);

        if ($params['get'][0] && Session::getSession()->getKey('user')['role']) {

            if (Session::getSession()->getKey('user')['role'] == 2) {
                $this->render('View/post/connectedView.php');
            }
            
            if (Session::getSession()->getKey('user')['role'] == 1) {
                $this->render('View/post/subscriberView.php');
            }

            return false;
        }

        $this->render('View/post/view.php');
    }

    //=================Gestion des posts par l'Admin==========================//
   
    public function add($params)
    {
        $this->set('user', Session::getSession()->getKey('user'));

        if (!empty($params['post'])) {
            if (!empty(Session::getSession()->getKey('user')['role'])
            || Session::getSession()->getKey('user')['role'] == 2) {
                $this->manager->add($params);
                $this->redirect('/admin/index');
            }
        }
      
        $this->render('View/post/add.php');
    }

    public function update($params)
    {
        $this->set('user', Session::getSession()->getKey('user'));
      
        if (Session::getSession()->getKey('user')['role'] != 2) {
            $this->redirect('/admin/index');
        }

        if (!empty($params['post'])) {
            $this->manager->update($params);
            $this->redirect('/admin/index');
        }

        $postId = $params['get'][0];
        $post = $this->manager->getPost($postId);
        $this->set('post', $post);
        $this->render('View/post/update.php');
    }

    public function delete($params)
    {
        if (Session::getSession()->getKey('user')['role'] != 2) {
            $this->redirect('/');
        }

        $this->manager->delete($params);
        $this->redirect('/admin/index');
    }
}
