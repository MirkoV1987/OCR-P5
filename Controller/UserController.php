<?php

require_once('Manager/UserManager.php');
require_once('Model/User.php');
require_once('Framework/Controller.php');


class UserController extends Controller
{

    private $userManager;
    private $successMsg;
    private $errorMsg;

    public function __construct()
    {
        $this->userManager = new UserManager();
    } 

    public function register($params)
    {

        if (isset($params['post']['submit']) ) {

        $this->userManager->register($params);
        $this->redirect('/OCR-P5/user/login');

        }

        $this->render('view/user/register.php');

    } 

    public function login($params) 
    {   
        if (isset($params['post']['submit']) ) {
            
            $username = $params['post']['username'];
            $password = $params['post']['password'];
            
            $user = $this->userManager->login($username, $password);
            print_r($username);
            print_r($password);
            exit;
            
            $_SESSION['user'] = $user;
        
            if ($user && $user['role'] == 2) {
                //print_r($user); exit;
            $this->redirect('/OCR-P5/admin/index'); 

            }

            if ($user && $user['role'] == 1) {

            $this->redirect('/OCR-P5/index');

            }
            
        }

        $this->render('view/user/login.php');

    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/OCR-P5');
    }

    public function view($params)
    {
        if(!isset($_SESSION['user']['role']) OR $_SESSION['user']['role'] != 2) {

        echo "Vous ne pouvez pas modifier les données des utilisateurs";
    
        }  

        if (empty($params['get'][0]) ) {

        $this->redirect('/OCR-P5/admin/index');

        }

        $extract = explode('-', $params['get'][0]);
        $id = intval($extract[0]);

        $user = $this->userManager->getUser($id); 
        $this->set('user', $user);
        $this->render('view/user/view.php');
      
    }

    public function add($params)
    {
        if(!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] != 2) {

        $this->redirect('/OCR-P5/user/login');
    
        }

        if (!empty($params['post']) && $_SESSION['user']['role'] == 2) {

        $user = $this->userManager->add($params);
        $this->redirect('/OCR-P5/admin/index');

        }  
      
      $this->render('view/index');

    }

    public function update($params)
    {
      if($_SESSION['user']['role'] != 2) {
    
        $this->redirect('/OCR-P5/user/login');

      }

      if (!empty($params['post']) ) {

        $user = $this->userManager->update($params);
        $this->redirect('/OCR-P5/admin/index');

      }  

      $id = $params['get'][0];
      $user = $this->userManager->getUser($id);
      $this->set('user', $user);
      $this->render('View/user/update.php');
    }

    public function delete($params)
    {
       if($_SESSION['user']['role'] != 2) {
 
        $this->redirect('/OCR-P5/user/login');
 
       }
 
       $user = $this->userManager->delete($params);
       $this->redirect('/OCR-P5/admin');

    }

}