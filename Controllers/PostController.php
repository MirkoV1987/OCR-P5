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
        $this->render('View/index.php');
    }

    public function view($params)
    {
        $this->set('user', \Framework\Session::getSession()->getKey('user'));
        $extract = explode('-', $params['get'][0]);
        $id = (int)($extract[0]);

        if ($params['get'][0] && \Framework\Session::getSession()->getKey('user')['role']) {
            if (\Framework\Session::getSession()->getKey('user')['role'] == 1
            || \Framework\Session::getSession()->getKey('user')['role'] == 2) {
                $post = $this->manager->getPost($id);
                $comments = $this->commentManager->getComment($id);
                $this->set('comments', $comments);
                $this->set('post', $post);
                $this->render('View/post/connectedView.php');
            }

            return false;
        }

        $post = $this->manager->getPost($id);
        $comments = $this->commentManager->getComment($id);
        $this->set('comments', $comments);
        $this->set('post', $post);
        $this->render('View/post/view.php');
    }

    //=================Gestion des posts par l'Admin==========================//
   
    public function add($params)
    {
        $this->set('user', \Framework\Session::getSession()->getKey('user'));

        if (!empty($params['post'])) {
            if (!empty(\Framework\Session::getSession()->getKey('user')['role'])
            || \Framework\Session::getSession()->getKey('user')['role'] == 2) {
                $this->manager->add($params);
                $this->redirect('/admin/index');
            }
        }
      
        $this->render('View/post/add.php');
    }

    public function update($params)
    {
        $this->set('user', \Framework\Session::getSession()->getKey('user'));
      
        if (\Framework\Session::getSession()->getKey('user')['role'] != 2) {
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
        if (\Framework\Session::getSession()->getKey('user')['role'] != 2) {
            $this->redirect('/');
        }

        $this->manager->delete($params);
        $this->redirect('/admin/index');
    }
}
