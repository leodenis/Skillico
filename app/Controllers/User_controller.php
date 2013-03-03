<?php 

class User_controller extends Prefab{
	function __construct(){

	}

	function homeUser(){ 
     $User=new User();
     $info=$User->InfoDetails();
     F3::set('info',$info);
 	 echo Views::instance()->render('user.php');
	}

	function inscription(){

		switch(F3::get('VERB')){
			case 'GET':
				echo Views::instance()->render('formulaireInscription.html');
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
			      'date_creation'=>'required',
			      'last_connection'=>'required'
			     
			    );
				
				// $id_image=$_POST['fk_id_image'];

			    if ($_POST['password'] != $_POST['password2']) {
			    	echo "Les mots de passes doivent être identiques! Veuillez recommercer";
			    	return;
			    }

			    $error=Datas::instance()->check(F3::get('POST'),$check);
			    if($error){
			      F3::set('errorMsg',$error);
			      echo Views::instance()->render('formulaireInscription.html');
			      F3::reroute('/');
			      return;
			    }
			    else{
				    $days=$_POST['days'];
			   		$month=$_POST['month'];
			   		$years=$_POST['years'];
			   		$born=$years.'-'.$month.'-'.$days;	
			    	//Ajout dans la base de donnée			    	
			    	$password=$_POST['password'];
		   			$user=new User;
		   			$user->inscription($password,$born);
					F3::reroute('/');
			    }
			break;
		}
	   
	}
	function inscriptionfb(){
		require './app/Libraries/facebook.php';
 

			$facebook = new Facebook(array(
			'appId' => '340091096096955',
			'secret' => 'd67a97f795f53caa019784e1d30cf49e',
			'cookie' => true
			));
			$user = $facebook->getUser(); //Savoir si une session fb a été initialisée
			if (!$user) {
				$param = array( 
				'redirect_uri' => 'http://localhost/SkillicoMdp/Skillico/user/facebookConnect',
				'scope' => 'email,user_birthday,offline_access'
				);
				F3::reroute($facebook->getLoginUrl($param));
			} 
			else {
				try {
					$user = $facebook->getUser();
					$facebook_profile = $facebook->api('/me');
				} 
				catch (FacebookApiException $e) {
					error_log($e);
					$user = null;
				}
			}
		
		$email=$facebook_profile['email'];
		$name=$facebook_profile['last_name'];
		$firstname=$facebook_profile['first_name'];
		$birthday=$facebook_profile['birthday'];;
		$imgProfil='https://graph.facebook.com/'.$facebook_profile["id"].'/picture?type=large';
		$born=explode('/',$birthday);
		$years=$born[2];
		$month=$born[0];
		$days=$born[1];	
	   	$born=$years.'-'.$month.'-'.$days;
		$username=$facebook_profile['username'];
		$city=$facebook_profile['location']['name'];
		if($facebook_profile['gender'] == 'male'){
			$gender='Homme';
		}
		else{
			$gender='Femme';
		}

		$password = uniqid();

		$userInscriptionFb=new User;
		$recupMdpId=$userInscriptionFb->inscriptionfb($username,$email,$name,$firstname,$password,$gender,$city,$born,$imgProfil);
		
		F3::set('SESSION.user',$recupMdpId);
		F3::reroute('/monCompte');


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
		   			$id=2;
		   			F3::set('SESSION.user',$recupMdpId);
		   			//Récupération de l'id users afin de updater la last connexion



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
			    	
					
					$password = uniqid();
					
					//récup du log et appel du modèle
			    	$login=$_POST['login'];
		   			$user_log=new User;
		   			$recupLog=$user_log->forgetpassword($login,$password);
		 
					
		   			if ($recupLog == false) {
		   			echo 'try again';
		   			}
					else{
				
						$email = $recupLog[0]['email'];
									// F3::sendmail($password);
						Mail::instance()->sendmail($password,$email);
						F3::reroute('/');
					}
			    }
			break;
		}

	}

	function monCompte(){
		$id=F3::get('SESSION.user');
	    $id=$id[0]['id_users'];
	    //récupération des infos de l'user
		$User=new User();
		$infoUserCo=$User->infoUserCo($id);
		//Récupération des offres posté par l'utilisateur
		$Offer=new Offer();
		$getOfferByUSerId=$Offer->getOfferByUSerId($id);

		//Récupération annonces postées
		$Offer=new Offer();
		$getOfferRespondByUSerId=$Offer->getOfferRespondByUSerId($id);

		//Récupération avis
		$User=new User();
		$avisUser=$User->avis($id);

		//Récupération paiement Reçu
		$Offer=new Offer();
		$PaiementRecu=$Offer->PaiementRecu($id);

		$Offer=new Offer();
		$PaiementDonnee=$Offer->PaiementDonnee($id);


		$RespondAndPosted = array_merge($getOfferByUSerId, $getOfferRespondByUSerId);

		    // print_r($infoUserCo);
		F3::set('infoUserCo',$infoUserCo);
		F3::set('getOfferByUSerId',$getOfferByUSerId);
		F3::set('getOfferRespondByUSerId',$getOfferRespondByUSerId);
		F3::set('RespondAndPosted',$RespondAndPosted);
		F3::set('avisUser',$avisUser);
		F3::set('PaiementRecu',$PaiementRecu);
		F3::set('PaiementDonnee',$PaiementDonnee);

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

	   		$days=$_POST['days'];
	   		$month=$_POST['month'];
	   		$years=$_POST['years'];
	   		$born=$years.'-'.$month.'-'.$days;

	        $id = F3::get('SESSION.user');
	   		$id=$id[0]['id_users'];
	        $User=new User();
		    $infoUserCo=$User->infoUserCo($id);
		    $password=$_POST['password'];
		    $id_image=$infoUserCo[0]['id_image'];
			$User=new User();
		    $EditInfoUser=$User->EditInfoUser($id,$id_image,$password,$born);
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