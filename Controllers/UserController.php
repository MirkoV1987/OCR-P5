<?php

namespace Controllers;

use \Manager;
use \Framework;

class UserController extends \Framework\Controller
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new \Manager\UserManager();
    }

    public function register($params)
    {
        if (isset($params['post']['submit'])) {
            $this->userManager->register($params);
            $this->redirect('/user/login');
        }

        $this->render('View/user/register.php');
    }

    public function login($params)
    {
        if (isset($params['post']['submit'])) {
            $username = $params['post']['username'];
            $password = $params['post']['password'];
            
            $user = $this->userManager->login($username, $password);

            $_SESSION['user'] = $user;
        
            if (\Framework\Session::getSession()->getKey('user')['role']
        && \Framework\Session::getSession()->getKey('user')['role'] == 2) {
                $this->redirect('/admin/index');
            }
        
            if (\Framework\Session::getSession()->getKey('user')['role']
        && \Framework\Session::getSession()->getKey('user')['role'] == 1) {
                $this->redirect('/');
            }
        }

        $this->render('View/user/login.php');
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/');
    }

    public function view($params)
    {
        $this->set('user', \Framework\Session::getSession()->getKey('user'));

        if (empty(\Framework\Session::getSession()->getKey('user')['role'])
        || \Framework\Session::getSession()->getKey('user')['role'] != 2) {
            return false;
        }

        if (empty($params['get'][0])) {
            $this->redirect('/View/index');
        }
      
        $extract = explode('-', $params['get'][0]);
        $id = intval($extract[0]);
        $user = $this->userManager->getUser($id);
        $this->set('user', $user);
        $this->render('View/user/view.php');
    }

    public function add($params)
    {
        if (!empty($params['post']) 
        && !empty(\Framework\Session::getSession()->getKey('user')['role']) 
        && \Framework\Session::getSession()->getKey('user')['role'] == 2) {
            $this->userManager->add($params);
            $this->redirect('/admin/index');
        }
      
        $this->set('user', \Framework\Session::getSession()->getKey('user'));
        $this->render('View/user/add.php');
    }

    public function update($params)
    {
        if (\Framework\Session::getSession()->getKey('user')['role'] != 2) {
            $this->redirect('/admin/index');
        }

        if (!empty($params['post'])) {
            $this->userManager->update($params);
            $this->redirect('/admin/index');
        }

        $extract = explode('-', $params['get'][0]);
        $id = intval($extract[0]);
        $user = $this->userManager->getUser($id);
        $this->set('user', $user);
        $this->render('View/user/update.php');
    }

    public function delete($params)
    {
        if (\Framework\Session::getSession()->getKey('user')['role'] != 2) {
            $this->redirect('/user/login');
        }
 
        $this->userManager->delete($params);
        $this->redirect('/admin/index');
    }
}
