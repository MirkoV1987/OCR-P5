<?php

/**
 * 
 * Register Controller
 */

require_once('Model/User.php');
require_once('Manager/UserManager.php');
require_once('Framework/Controller.php');

class RegisterController extends Controller 
{

  private $userManager;

  public function __construct()
  {
    $this->userManager = new UserManager;
  }

  public function index()
  {
      $this->generateView();
  }

  public function register()
  {

  }

  public function validation()

     








}

 
