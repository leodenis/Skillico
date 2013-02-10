<?php 

class User_controller{
	function __construct(){

	}

	function homeUser(){ 
     $User=new User();
     $info=$User->InfoDetails();
   	 // F3::set('info',$info->afind());
     F3::set('info',$info);
 	 echo Views::instance()->render('user.php');

 	 if(empty($_SESSION['user'])){
 	 	
 	 }
 	 else{
 	     $login=$_SESSION['user'];
 	 	 $User=new User();
    	 $infoUserCo=$User->infoUserCo($login);
    	 F3::set('infoUserCo',$infoUserCo);
 	 	 echo Views::instance()->render('user.php');

 	 }

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
			    	echo 'Merci, votre inscription a bien été prise en compte!';
			    	//Ajout dans la base de donnée
			    	$password=$_POST['password'];
		   			$user=new User;
		   			$user->inscription($password);
					// $image=new DB\SQL\Mapper(F3::get('dB'),'image'); // Connexion à la table image
					// $image->copyFrom('POST'); // on récupère le POST
					// $image->save(); // on sauvegarde
			      //
			      //$user->record();
			    }
			break;
		}
	   
	}

	function connexion(){

		switch(F3::get('VERB')){
			case 'GET':
				echo Views::instance()->render('connexion.php');
			break;
			case 'POST':
				 $check=array(
			      'login'=>'required',
		   	      'password'=>'required'
			     
			    );

				$login=$_POST['login'];
				$password=md5($_POST['password']);

				$user_connexion=new User;
		   		$test=$user_connexion->connexion($login,$password);
		   		if ($test == false) {
		   			echo 'try again';
		   		}
		   		else {
		   			//Création Session
		   			F3::set('SESSION.user',$login);
		   			echo 'vous êtes connecté';
		   			F3::reroute('/user/');


		  
		   		}
			   
			    $error=Datas::instance()->check(F3::get('POST'),$check);
			    if($error){
			      F3::set('errorMsg',$error);
			      echo Views::instance()->render('connexion.php');
			      return;
			    }
			    else{	
	
			    }
			break;
		}
	   
	}

	function deconnexion(){
		F3::clear('SESSION.user');
		F3::reroute('/user/');
	}
	function delete(){
		$image=new DB\SQL\Mapper(F3::get('dB'),'image');
		$image->load(array('id_image=1'));
		$image->erase();
	}

	function __destruct(){

	}

}