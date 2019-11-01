<?php
/**
 * 
 * Contrôleur de création de compte
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
      if ($this->request->existsParams("username")
          && $this->request->existsParams("email")
          && $this->request->existsParams("password")
          && $this->request->existsParams("verifyPassword")  {

          $username = $this->request->getParams("username");
          $email = $this->request->getParams("email");
          $password = $this->request->getParams("password");
          $verifyPassword = $this->request->getParams("verifyPassword");

          if (!filter_var($email, FILTER_VALIDATE_MAIL) )  {

              throw new Exception("L'adresse email est invalide");

          }

          if (strlen($password) < 8 && !preg_match_all('[!%@&$#*]', $password) )  {

              throw new Exception("Mot de passe incorrect ! Minimum 8 caractères. /n
                                   Le mot de passe doit contenir au moins un caractère parmi les suivants : %@&$#*");
          }

          if ($password === $verifyPassword) {
              
              $password = password_hash($password, PASSWORD_BCRYPT);
              $validation_key = md5(microtime(TRUE)*100000);

              $user = new User(array(
                      'username' => $username,
                      'email' => $email,
                      'password' => $password,
                      'active' => $active,
                      'validation_key' => $validation_key,
                      'role' => $role,
                      'date_add' => date('Y-m-d H:i:s')
               ) );

               $this->userManager->add($user);

               //Envoi d'un mail avec la clé de validation

               $to = $email;
               $email_subject = "Activation de votre compte du Blog de Mirko Venturi";

               $email_body = 'Bienvenue sur le Blog de Mirko Venturi./n
                  
                              Pour activer votre compte, merci de cliquer sur le lien ci-dessous
                              ou de le copier dans votre navigateur

                              http://hostmirko/OCR-P5/' 'registration/validation'. urlencode($username). '/' . urlencode($validation_key).'

                              ------------------------------------------------------
                              Ceci est un mail automatique. Merci de ne pas y répondre';
            
               $headers = "From: noreply@yourdomain.com \n";
               $headers .= "Reply-to:" . $email;
               
               mail($to, $email_subject, $email_body, $headers);

               $this->redirect("login");

               } else {
                        throw new Exception("Les mots de passe insérés ne correspondent pas.");
            } 

        }

    }

    // L'utilisateur valide son compte dès qu'il clique sur le lien de validation
  
  public function validation()
  {
      if($this->request->existsParams("validation_key") && $this->request->existsParams("key")) {

         $username = $this->request->getParams("username");
         $key = $this->request->getParams("key");
         $user = $this->userManager->getUserByUsername($username);
        
         //Vérifier que la clé donnée est identique à la clé enregistrée en BDD
         if ($user->getValidation_key() === $key) {

             $user->setActive(1);
             $this->userManager->update($user);
             $this->generateView();

         } else {
                     throw new Exception("Clé de validation incorrect !");
         }


      }


  }
 
  
}
 
