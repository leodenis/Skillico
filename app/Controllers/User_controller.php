<?php 

class User_controller{
	function __construct(){

	}

	function get(){ 
     $User=new User();
     $info=$User->InfoDetails();
   	 // F3::set('info',$info->afind());
     F3::set('info',$info);
 	 echo Views::instance()->render('user.php');


	}

	function post(){
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
	      echo Views::instance()->render('user.php');
	      return;
	    }
	    else{	
	    	echo 'Merci, votre inscription a bien été prise en compte!';
	    	//Ajout dans la base de donnée
   			$user=new User;
   			$user->post();
			// $image=new DB\SQL\Mapper(F3::get('dB'),'image'); // Connexion à la table image
			// $image->copyFrom('POST'); // on récupère le POST
			// $image->save(); // on sauvegarde
	      //
	      //$user->record();
	    }
	}

	function delete(){
		$image=new DB\SQL\Mapper(F3::get('dB'),'image');
		$image->load(array('id_image=1'));
		$image->erase();
	}

	function __destruct(){

	}

}