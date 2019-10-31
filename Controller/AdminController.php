<?php

/**
 * 
 * Contrôleur des actions d'administration du blog
 */

require_once('Manager/PostManager.php');
require_once('Manager/CommentManager.php');
require_once('Manager/UserManager.php');
require_once('Model/Post.php');
require_once('Model/Comment.php');
require_once('Model/User.php');


 class AdminController 
 {

  private $postManager;
  private $commentManager;
  private $userManager;

    public function __construct()
    {
        $this->postManager = new PostManager;
        $this->commentManager = new CommentManager;
        $this->userManager = new UserManager;
    }

    public function index()
    {
    
        //vérifier si l'utilisateur a pour rôle Admin
        //écrire le script ControllerSecured
    
    }

    //=====================Gestion des posts==========================//

    public function postManagement()
    {
        $numberPosts = $this->postManager->count();
        
        $usernamne = $this->request->getSession()->getAttribute("username"); //voir pour lier l'utilisateur aux classes Request et Session

        $posts = $this->postManager->getList();
        //$this->generateView(array(TO DO: écrire le tableau comme indiqué dans la function de la classe abstraite View) );
    }

    public function postEdit()
    {
        $post = $this->postManager->getPost($id);
        //$this->generateView(array(TO DO: écrire le tableau comme indiqué dans la function de la classe abstraite View) );
    }

    public function postUpdate()
    {
        $this->id = $id;
        $this->title = $title;
        $this->chapeau = $chapeau;
        $this->content = $content;  
        
        $post = $this->postManager->getPost($id);
        $post->setTitle($title);
        $post->setChapeau($chapeau);
        $post->setContent($content);

        $post = $this->postManager->update($post);
        //TO DO: $this->generateView(array(TO DO: écrire le tableau comme indiqué dans la function de la classe abstraite View) );
        //TO DO: $this->executeAction(); redirection
    }

    public function postDelete()
    {
        $post = $this->postManager->getPost($id);
        
        $post = new Post(array('id' => $id) );
        
        $this->postManager->delete($post);

        //TO DO: message "post suppirmé avec succès"
        //TO DO: $this->executeAction(); redirection vers la liste des posts
    } 

    public function postAdd()
    {
        $post = new Post(array(
            'title' => $title, 
            'chapeau' => $chapeau, 
            'date_add' => date('Y-m-d H:i:s'),
            'user_id' => $user_id,
            'content' => $content 
        ) );

        $this->postManager->add($post);

        //TO DO: message "post ajouté avec succès"
        //TO DO: $this->executeAction(); redirection vers la liste des posts
    }

    //======================Gestion des utilisateurs======================//

    public function userManagement()
    {
        $users = $this->userManager->getList();
        //$this->generateView(array(TO DO: écrire le tableau comme indiqué dans la function de la classe abstraite View) );
    }

    public function userEdit()
    {
        $user = $this->userManager->getUser($id);
        //$this->generateView(array(TO DO: écrire le tableau comme indiqué dans la function de la classe abstraite View) );
    }

    public function userUpdate()
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;

        $user = $this->userManager->getUser($id);
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setRole($role);

        $user = $this->userManager->update($user);
        //TO DO: $this->generateView(array(TO DO: écrire le tableau comme indiqué dans la function de la classe abstraite View) );
        //TO DO: $this->executeAction(); redirection
    }

    public function userDelete()
    {
        $user = $this->userManager->getUser($id);
        
        $user = new User(array('id' => $id) );
        
        $this->userManager->delete($user);

        //TO DO: message "utilisateur supprimé avec succès"
        //TO DO: $this->executeAction(); redirection vers la liste des utilisateurs
    } 

    public function resetPassword()
    {
        $user = $this->userManager->getId($id);
        //Génération d'un nouveau token qu'on attribue à l'utilisateur
        $validation_key = md5(microtime(TRUE)*100000);
        $user->setValidation_key($validation_key);
        $this->userManager->update($user);

        //Création et envoi d'un mail
        $to = $user->getEmail();
        $email_subject = "Réinitialisation de votre mot de passe";
        $email_body = 'Blog de Mirko Venturi. \n\n'
                    .'Bonjour'. $user->getUsername()
                    .', veuillez cliquer sur le lien ci-dessous pour réinitialiser votre mot de passe.\n\n '
                    . 'http://hostmirko/OCR-P5/'. 'login/reset'. urlencode($user->getUsername()). '/' . urlencode($user->getValidation_key())
                    .'
                     ----------------------
                     Ceci est un mail automatique, merci de ne pas y répondre.';

        $headers = "From: noreply@yourdomain.com \n";
        $headers .= "Reply-to:" . $user->getEmail();
        mail($to, $email_subject, $email_body, $headers).

        $this->successMsg = "Mail de réinitialisation de mot de passé envoyé !";
        //$this->executeAction(); TO DO: Add view "sent email"
    }

    
    //=======================Gestion des commentaires=======================//

    public function commentManagement()
    {
        $comments = $this->commentManager->getList();
        //$this->generateView(array(TO DO: écrire le tableau comme indiqué dans la function de la classe abstraite View) );
    }

    public function commentActive()
    {
        $comment = $this->commentManager->getComment($commentId);
        
        $comment->setActive(1);

        $comment = $this->commentManager->update($comment);

        //TO DO: message "commentaire activé avec succès"
        //TO DO: $this->executeAction(); redirection vers la liste des commentaires
    }

    public function commentDelete()
    {
        $comment = $this->commentManager->getComment($commentId);
        
        $comment = new Comment(array('id' => $id) );
        
        $this->commentManager->delete($comment);

        //TO DO: message "commentaire suppirmé avec succès"
        //TO DO: $this->executeAction(); redirection vers la liste des commentaires
    }


 }
