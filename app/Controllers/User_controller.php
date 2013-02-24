<?php 

class User_controller extends Prefab{
	function __construct(){

	}

	function homeUser(){ 
     $User=new User();
     $info=$User->InfoDetails();
   	 // F3::set('info',$info->afind());
     F3::set('info',$info);
 	 echo Views::instance()->render('user.php');

 // 	 if(empty($_SESSION['user'])){
	// echo 	 	'aucune session';
 // 	 }
 // 	 else{
 // 	     $id=F3::get('SESSION.user');
 // 	     $User=new User();
 //    	 $infoUserCo=$User->infoUserCo($id);

 //    	 F3::set('infoUserCo',$infoUserCo);
 // 	 	 echo Views::instance()->render('user.php');

 // 	 }

	}

	function inscription(){

		switch(F3::get('VERB')){
			case 'GET':
				echo Views::instance()->render('inscription.php');
			break;
			case 'POST':
				 $check=array(
			      'login'=>'required',
		   	      'password'=>'required',
		   	      'password2' => 'required',
			      'email'=>'required',
			      'name'=>'required',
			      'firstname'=>'required',
			      'adress'=>'required',
			      'phone'=>'required',
			      'date_creation'=>'required',
			      'last_connection'=>'required',
			      'level'=>'required'
			     
			    );
				
				// $id_image=$_POST['fk_id_image'];

			    if ($_POST['password'] != $_POST['password2']) {
			    	echo "Les mots de passes doivent être identiques! Veuillez recommercer";
			    	return;
			    }

			    $error=Datas::instance()->check(F3::get('POST'),$check);
			    if($error){
			      F3::set('errorMsg',$error);
			      echo Views::instance()->render('inscription.php');
			      return;
			    }
			    else{	
			    	//Ajout dans la base de donnée
	
			    	
			    	$password=$_POST['password'];
		   			$user=new User;
		   			$user->inscription($password);
		   			echo 'Merci, votre inscription a bien été prise en compte!';


			    }
			break;
		}
	   
	}

	function inscriptionfb(){

		

		//génére aléatoirement un mot de passe
		$string = "";
		$chaine = "abcdefghijklmnpqrstuvwxy1234567890";
		srand((double)microtime()*1000000);
		for($i=0; $i<10; $i++) {
		$string .= $chaine[rand()%strlen($chaine)];
		}


		//Envoie du mot de passe
		// $headers ='From: "nom"<denisleo23@gmail.com>'."\n"; 
	 //    $headers .='Reply-To: denisleo23@gmail.com'."\n"; 
	 //    $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n"; 
	 //    $headers .='Content-Transfer-Encoding: 8bit'; 
  //       $message ='<html><head><title>Bonjour</title></head><body>Merci pour votre inscription sur Skillico via votre compte FACEBOOK. Voici votre mot de passe'.$string.'</body></html>'; 
		// mail('denisleo23@gmail.com', 'Sujet', $message, $headers);

		$password=$string;
		$user=new User;
		$user->inscriptionfb($password);

		F3::reroute('/user');

	}

	function connexion(){

		switch(F3::get('VERB')){
			case 'GET':
				echo Views::instance()->render('index.html');
			break;
			case 'POST':
				 $check=array(
			      'login'=>'required',
		   	      'password'=>'required'
			     
			    );
				$login=$_POST['login'];
				$password=md5($_POST['password']);

				$user_connexion=new User;
		   		$recupMdpId=$user_connexion->connexion($login,$password);
		   		if ($recupMdpId == false) {
			      	F3::reroute('/');
		   		}
		   		else {
		   			//Création Session
		   			date_default_timezone_set('Europe/Paris');  
		   			$date=date("Y-m-d H:i:s");
		   			F3::set('SESSION.user',$recupMdpId);
		   			//Récupération de l'id users afin de updater la last connexion
		   			$id=$recupMdpId[0]['id_users'];
		   			$users=new DB\SQL\Mapper(F3::get('dB'),'users'); // Connexion à la table image
			 		$users->load(array('id_users=?',$id));
			 		$users->last_connection=$date; // on récupère le POST
					$users->update(); // 

		   			F3::reroute('/monCompte');
		   		}
			   
			    $error=Datas::instance()->check(F3::get('POST'),$check);
			    if($error){
			      F3::set('errorMsg',$error);
			      echo Views::instance()->render('index.html');
			      F3::reroute('/');
			      return;
			    }
			    else{	
	
			    }
			break;
		}
	   
	}

	function forgetpassword(){
		switch(F3::get('VERB')){
			case 'GET':
				echo Views::instance()->render('forgetpassword.php');
			break;
			case 'POST':
				 $check=array(
			      'login'=>'required'
			     
			    );


			    $error=Datas::instance()->check(F3::get('POST'),$check);
			    if($error){
			      F3::set('errorMsg',$error);
				  echo Views::instance()->render('forgetpassword.php');
			      return;
			    }
			    else{
			    	//préparation du mdp
			    	$password = "";
					$chaine = "abcdefghijklmnpqrstuvwxy1234567890";
					srand((double)microtime()*1000000);
					for($i=0; $i<10; $i++) {
					$password .= $chaine[rand()%strlen($chaine)];
					}	
					//récup du log et appel du modèle
			    	$login=$_POST['login'];
		   			$user_log=new User;
		   			$recupLog=$user_log->forgetpassword($login,$password);
	
		   			if ($recupLog == false) {
		   			echo 'try again';
		   			}
					else{

						$headers ='From: "nom"<denisleo23@gmail.com>'."\n"; 
						$headers .='Reply-To: denisleo23@gmail.com'."\n"; 
						$headers .='Content-Type: text/html; charset="iso-8859-1"'."\n"; 
						$headers .='Content-Transfer-Encoding: 8bit'; 
					    $message ='<html><head><title>Bonjour</title></head><body>Voici votre nouveau mot de passe'.$password.'. Vous pouvez dès maintenant le changer dans votre espace</body></html>'; 
						mail('denisleo23@gmail.com', 'Sujet', $message, $headers);
					}
			    }
			break;
		}

	}

	function monCompte(){
		$id=F3::get('SESSION.user');
	    $id=$id[0]['id_users'];

		$User=new User();
		$infoUserCo=$User->infoUserCo($id);

		$Offer=new Offer();
		$getOfferByUSerId=$Offer->getOfferByUSerId($id);
		    // print_r($infoUserCo);
		F3::set('infoUserCo',$infoUserCo);
		F3::set('getOfferByUSerId',$getOfferByUSerId);

		$view=new View(); 
		echo $view->render('monCompte.php'); 	

	}

	function edit(){
	    switch(F3::get('VERB')){
	      case 'GET':
	       	$id=F3::get('SESSION.user');
	       	$id=$id[0]['id_users'];
			$User=new User();
		    $infoUserCo=$User->infoUserCo($id);
		    // print_r($infoUserCo);
		    F3::set('infoUserCo',$infoUserCo);
	        Views::instance()->render('monCompte.php');
	        F3::reroute('/monCompte');
	      break;
	      case 'POST':
	        $id = F3::get('SESSION.user');
	   		$id=$id[0]['id_users'];
	        $User=new User();
		    $infoUserCo=$User->infoUserCo($id);
		    
		    $id_image=$infoUserCo[0]['id_image'];
			$User=new User();
		    $EditInfoUser=$User->EditInfoUser($id,$id_image);
		    F3::reroute('/');
	      break;
	    }
  	}

	function deconnexion(){
		F3::clear('SESSION.user');
		F3::reroute('/');
	}
	function delete(){
		$image=new DB\SQL\Mapper(F3::get('dB'),'image');
		$image->load(array('id_image=1'));
		$image->erase();
	}

	function __destruct(){

	}

}