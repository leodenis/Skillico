<?php 
class User{
	function __construct(){

	}
	
	function InfoDetails(){
		// $info=new DB\SQL\Mapper(F3::get('dB'),'users');
		// return $info->load(array('id_users=?','5'));
		return $info = F3::get('dB')->exec("SELECT U.id_users,U.name,U.firstname,U.email,U.adress,U.phone,U.date_creation,U.last_connection,U.level,U.name,I.name, I.extension FROM users U, image I WHERE U.fk_id_image = I.id_image AND U.id_users =2" );


	}

	function inscription($password){
 			$users=new DB\SQL\Mapper(F3::get('dB'),'users'); // Connexion à la table image
 			$users->copyFrom('POST'); // on récupère le POST
 			$users->password=md5($password);
			$users->save(); // on sauvegarde
	}

	function connexion($login,$password){
			 $connexion = F3::get('dB')->exec("SELECT * FROM users WHERE login = '".$login."' AND password ='".$password."'");
			 if (count($connexion) == 0) {
				$connexion=false;			 	
			 	return $connexion;
			 }
			 else{
			 	$connexion=true;			 	
			 	return $connexion;
			 }

	}

	function infoUserCo($login){
			return $infoUserCo = F3::get('dB')->exec("SELECT * FROM users WHERE login = '".$login."'");

	}
	function __destruct(){

	}
}
