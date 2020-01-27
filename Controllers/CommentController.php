<?php

namespace Controllers;

use Manager\CommentManager;
use Framework\View;
use Framework\Session;

class CommentController extends View
{
    private $manager;

    public function __construct()
    {
        $this->manager = new CommentManager();
    }

    public function index($params)
    {
        if (empty($params)) {
            $this->manager->getList();
        }

        $this->manager->getList($params['get'][0]);
    }

    public function view($params)
    {
        $extract = explode('-', $params['get'][0]);
        $post_id = (int)($extract[0]);

        $this->manager->getComment($post_id);
        $this->set('comments', $comments);
        $this->set('post', $post);

        if (!empty(Session::getSession()->getKey('user')['role'])
        && Session::getSession()->getKey('user')['role'] == 2) {
            $this->render('View/post/connectedView.php');
        }
      
        $this->render('View/post/view.php');
    }

    public function add($params)
    {
        if (!empty($params['post']) && !empty(Session::getSession()->getKey('user')['role'])) {
            $this->manager->add($params);
            $post_id = $params['get'][0];
            $this->redirect('/post/view/'.$post_id);
        }

        $this->redirect('/post/view/'.$post_id);
    }

    public function validate($params)
    {
        if (Session::getSession()->getKey('user')['role'] == 2) {
            $post_id = $params['get'][0];
            $this->manager->validate($post_id);
            $this->redirect('/admin/index');
        }

        $this->redirect('/');
    }

    public function delete($params)
    {
        if (Session::getSession()->getKey('user')['role'] != 2) {
            $this->redirect('/post');
        }

        $this->manager->delete($params);
        $this->redirect('/admin');
    }
}
