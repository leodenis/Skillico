<?php
/**
 * Datas class extending native Prefab
 *
 * @package 1.0
 */
class Mail extends Prefab{

  function sendmail($password,$email){
    $headers ='From: "nom"<'.$email.'>'."\n"; 
    $headers .='Reply-To: denisleo23@gmail.com'."\n"; 
    $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n"; 
    $headers .='Content-Transfer-Encoding: 8bit'; 
    $message ='<html><head><title>Bonjour</title></head><body>Voici votre nouveau mot de passe '.$password.'. Vous pouvez dès maintenant le changer dans votre espace</body></html>'; 
    mail(''.$email.'', 'Sujet', $message, $headers);
  }

  function sendmailReclamation($subject,$email,$message,$user){
    $headers ='From: '.$user.'<'.$email.'>'."\n"; 
    $headers .='Reply-To: denisleo23@gmail.com'."\n"; 
    $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n"; 
    $headers .='Content-Transfer-Encoding: 8bit'; 
    mail('denisleo23@gmail.com', $subject, $message, $headers);
  }

  function sendmailInscriptionFb($password,$email){
    $headers ='From: "nom"<'.$email.'>'."\n"; 
    $headers .='Reply-To: denisleo23@gmail.com'."\n"; 
    $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n"; 
    $headers .='Content-Transfer-Encoding: 8bit'; 
    $message ='<html><head><title>Bonjour</title></head><body>Bienvenue sur Skillico.fr !</br>Voici votre mot de passe : '.$password.'. Vous pouvez dès maintenant le changer dans votre espace utilisateur</body></html>'; 
    mail(''.$email.'', 'Sujet', $message, $headers);
  }
}
?>