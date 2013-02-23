<?php
require 'src/facebook.php';
 
// Vous trouverez de quoi remplacer les X et les Y dans la page que je vous ai recommander de garder de coté dans l'étape 1 !
define("FB_APP_ID","340091096096955");
define("FB_SECRET","d67a97f795f53caa019784e1d30cf49e");

// on crée notre objet Facebook
$facebook = new Facebook(array(
      'appId'  => FB_APP_ID,
      'secret' => FB_SECRET,
      'cookie' => true,
));


// puis on tente de récuperer l'instance d'un éventuel utilisateur en cours
$currentUser = $facebook->getUser();

if($currentUser)
{
	try
	{
		$facebook_profile = $facebook->api('/me');
    }
	catch (FacebookApiException $e)
	{
		print_r($e);
		$user = null;
	}
}

// on récupère les URL de Login & de Logout
//
// les scopes sont les autorisations spéciale, une liste est disponible ici : 
// http://developers.facebook.com/docs/reference/api/permissions/
//
$loginUrl = $facebook->getLoginUrl(array('scope' => 'email,user_birthday,offline_access')); // ,publish_stream pour publier sur le mur de l'utilisateur
$logoutUrl  = $facebook->getLogoutUrl();



// 
// Poste sur le mur !
//

/*if(isset($_POST["status"]) && !empty($_POST["status"]))
{
	try
	{
		$publishStream = $facebook->api("/$currentUser/feed", 'post', array(
		'message' => $_POST["status"],
		'link'    => 'http://skillico.fr/',
		'picture' => 'image_skillico',
		'name'    => 'Skillico',
		'description'=> 'Le service communautaire rémunéré !'
		));
	} 
	catch (FacebookApiException $e)
	{
		print_r($e);
	}
	
	header("Location: index.php?fbstatus=updated");
	exit();
}*/