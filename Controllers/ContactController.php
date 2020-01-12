<?php

namespace Controllers;

use \Framework;

class ContactController
{
    
   public function __construct()
   {
    $this->sent = new \Framework\View;
   } 

    public function checkForm($params) 
    {
        // Vérification des champs vides
        if (empty($params['post']['name']) 
        || empty($params['post']['email']) 
        || empty($params['post']['phone']) 
        || empty($params['post']['message']) 
        || !filter_var(($params['post']['email']), FILTER_VALIDATE_EMAIL) ) {

        return false;

        }

        // Sécurisation des champs 
        $name = strip_tags(htmlspecialchars($params['post']['name']) );
        $email_address = strip_tags(htmlspecialchars($params['post']['email']) );
        $phone = strip_tags(htmlspecialchars($params['post']['phone']) );
        $message = strip_tags(htmlspecialchars($params['post']['message']) );
        
        // Création du mail et envoi du message
        $to = 'mirkoventuri.web@gmail.com';
        $email_subject = "Blog de Mirko Venturi :  $name";
        $email_body = "Vous avez reçu un message depuis le formulaire de contact du Blog.\n\n"."Détails :\n\nNom : $name\n\nEmail : $email_address\n\nTélephone : $phone\n\nMessage:\n$message";
        $headers = "From: noreply@gmail.com\n"; // Utiliser noreply@yourdomain.com.
        $headers .= "Répondre à : $email_address";   
        mail($to,$email_subject,$email_body,$headers);

        $this->sent->redirect('/View/mail.php');
    }

}
