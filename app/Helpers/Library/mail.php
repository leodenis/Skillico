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
  
}
?>