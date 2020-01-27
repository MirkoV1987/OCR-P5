<?php

namespace Controllers;

use Framework\View;

class ContactController
{
    public function __construct()
    {
        $this->sent = new View();
    }

    public function checkForm($params)
    {
        // Vérification des champs vides
        if (empty($params['post']['name'])
        || empty($params['post']['email'])
        || empty($params['post']['phone'])
        || empty($params['post']['message'])
        || !filter_var(($params['post']['email']), FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        // Sécurisation des champs
        $name = strip_tags(htmlspecialchars($params['post']['name']));
        $email = strip_tags(htmlspecialchars($params['post']['email']));
        $phone = strip_tags(htmlspecialchars($params['post']['phone']));
        $message = strip_tags(htmlspecialchars($params['post']['message']));
        
        // Création du mail et envoi du message
        $to      = 'mirkoventuri.web@gmail.com';
        $subject = "Blog de Mirko Venturi :  $name";
        $message = "Vous avez reçu un message depuis le formulaire de contact du Blog.\n\n"."Détails :\n\nNom : $name\n\nTélephone : $phone\n\nMessage:\n$message";
        $headers = array(
        'From' => $email,
        'Reply-To' => 'noreply@mirko-venturi.com',
        'X-Mailer' => 'PHP/' . phpversion()
        );
   
        mail($to, $subject, $message, $headers);

        $this->sent->redirect('/View/mail.php');
    }
}
