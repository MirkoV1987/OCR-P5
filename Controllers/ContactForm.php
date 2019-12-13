<?php

namespace Controllers;

class ContactForm
{

    // Vérification des champs vides
    if (empty($_POST['name']) 
    || empty($_POST['email']) 
    || empty($_POST['phone']) 
    || empty($_POST['message']) 
    || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {

    return false;

    }

    // Sécurisation des champs 
    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email_address = strip_tags(htmlspecialchars($_POST['email']));
    $phone = strip_tags(htmlspecialchars($_POST['phone']));
    $message = strip_tags(htmlspecialchars($_POST['message']));
    
    // Création du mail et envoi du message
    $to = 'mirkoventuri.web@gmail.com';
    $email_subject = "Blog de Mirko Venturi :  $name";
    $email_body = "Vous avez reçu un message depuis le formulaire de contact du Blog.\n\n"."Détails :\n\nNom : $name\n\nEmail : $email_address\n\nTélephone : $phone\n\nMessage:\n$message";
    $headers = "From: noreply@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    $headers .= "Répondre à : $email_address";   
    mail($to,$email_subject,$email_body,$headers);

    return true;

}
