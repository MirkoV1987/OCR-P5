<?php
/**
 * 
 * Contrôleur de la connexion au blog
 */
require_once('Manager/UserManager.php');
require_once('Model/User.php');
require_once('Framework/Session.php');


class LoginController extends Controller
{

    private $userManager;
    private $successMsg;
    private $errorMsg;

    public function __construct()
    {
        $this->userManager = new UserManager();
    } 

    public function login() 
    {
        sleep(1);
        $username = $this->getUsername();
        $password = $this->getPassword();

        if ($this->userManager->login($username, $password) )
        {
 
           $session = new Session(); 
           $this->getSession()->session_start();
           $isConnected = new User(); 

        }

    }

    public function logout()
    {
        $this->getSession()->destroy();
        $this->render('view/post/home.php');
    }

}