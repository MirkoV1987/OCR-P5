<?php
/**
 * 
 * Contrôleur de connexion au compte utilisateur
 */

require_once('Manager/UserManager.php');
require_once('Framework/Controller.php');

class LoginController extends Controller
{

    private $userManager;

    private $successMsg;
    private $errorMsg;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function index()
    {
        //generateView() TO DO: implement view
    }

    public function login()
    {
       sleep(1);
          if ($this->request->existsParams("username") && $this->request->existsParams("password") )
          {
              $username = $this->request->getParams("username");
              $password = $this->request->getParams("password");

              //Vérification de la combinaison username/password
              if ($this->userManager->login($username, $password))
              {
                  //Récuperation d'un objet User contenant toutes les infos de l'utilisateur
                  $user = $this->userManager->getUserByUsername($username);
                  if ($user->getActive() == '1')
                  {
                      $this->request->getSession()->setAttribute("id", $user->getId() );
                      $this->request->getSession()->setAttribute("username", $user->getUsername() );

                      if ($user->getRole() === "2")
                      {
                          $this->request->getSession()->setAttribute("role", 'admin');
                          $this->redirect("admin");
                      } 
                      else
                      {
                          $this->request->getSession()->setAttribute("role", 'member');
                          $this->redirect("index");
                      }
                  }
                  else
                    {
                        //Si le compte n'est pas activé
                        $this->errorMsg = "Compte non activé. Veuillez activer votre compte via le mail qui vous a été envoyé.";
                        $this->executeAction("index");
                    }
                else
                {
                    //Si les indetifiants ne sont pas corrects
                    $this->errorMsg = "Identifiant ou mot de passe incorrect. Veuillez réessayer";
                    $this->executeAction("index");
                }
            else
            {
                //Si l'un des champs est vide
                $this->errorMsg = "L'un des champs est vide";
                $this->executeAction("index");
            }
             
          }

       }

    }

    public function logout()
    {
        $this->request->getSession()->destroy();
        $this->redirect("index");
    }

    public function resetEmail()
    {
        $this->generateView();
    }

    public function resetPassword()
    {
        if ($this->request->existsParams("email") ) 
        {

           $email = $this->request->getParams("email");
           $user = $this->userManager->getUserByEmail("email");
           //Génération d'un nouveau token attribué à l'utilisateur
           $validation_key = md5(microtime(TRUE)*100000) );
           $user->setValidation_key($validation_key);
           $this->userManager->update($user);

           //Création et envoi de l'email
           $to = $user->getEmail();
               $email_subject = "Réinitialisation de votre mot de passe";

               $email_body = 'Blog de Mirko Venturi./n/n'

                              'Bonjour'. $this->getUsername().
                              ' , veuillez cliquer sur le lien ci-dessous pour réinitialiser votre mot de passe.'
                              'http://hostmirko/OCR-P5/' 'registration/validation'. urlencode($username). '/' . urlencode($validation_key).'

                              ------------------------------------------------------
                              Ceci est un mail automatique. Merci de ne pas y répondre.';
            
               $headers = "From: noreply@yourdomain.com \n";
               $headers .= "Reply-to:" . $this->getEmail();
               mail($to, $email_subject, $email_body, $headers);

               $this->redirect("login");

        }

    }

    public function reset()
    {
        if ($this->request->existParams("username") && $this->request->existParams("key") ) 
        {
            $username = $this->request->getParams("username");
            $key = $this->request->getParams("key");

            $user = $this->userManager->getUserByUsername("username");

            //Si la clé de validation inscrite dans la BDD est la même que celle du mail
            if ($user->getValidation_key() === $key)
            {
                //Si le formulaire a été envoyé 
                if ($this->request->existParams("resetSubmitted") )
                {
                    $password = $this->request->getParams("password");
                    $verifyPassword = $this->request->getParams("verifyPassword");

                    if ($password === $verifyPassword)
                    { 
                        $password = password_hash($password, PASSWORD_BCRYPT);
                        $user->setPassword($password);

                        //On change la clé de validation
                        $validation_key = md5(microtime(TRUE)*100000) );
                        $user->setValidation_key($validation_key);

                        $this->userManager->update($user);
                        $this->redirect("login");
                    }
                    else 
                    { 
                        throw new \Exception("Les mots de passe insérés ne correspondent pas !"); 
                    }
                }
                else 
                {
                       //Sinon, si les mots de passe n'ont pas encore été transmis via le formulaire
                       //$this->generateView() TO DO: implement View
                }
              
            }
            else
            {
                throw new \Exception("Clé de validation incorrecte !");
            }
        
        }
        else 
        {
           $this->redirect("login");  
        }

    }

}