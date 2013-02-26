<?php 
class User extends Prefab{
	function __construct(){

	}
	
	function InfoDetails(){
		// $info=new DB\SQL\Mapper(F3::get('dB'),'users');
		// return $info->load(array('id_users=?','5'));
		return $info = F3::get('dB')->exec("SELECT U.id_users,U.name,U.firstname,U.email,U.adress,U.phone,U.date_creation,U.last_connection,U.level,U.name,I.name, I.extension FROM users U, image I WHERE U.fk_id_image = I.id_image AND U.id_users =2" );


	}

	function inscription($password){
		   $img=Web::instance()->receive();
				    if($img){
				      $image=new DB\SQL\Mapper(F3::get('dB'),'image');
				      $image->name=$img[0];
				      $image->extension='.jpg';
				      $image->save();
				    }else{
				      $image=new DB\SQL\Mapper(F3::get('dB'),'image');
				      $image->name='photodebase.jpg';
				      $image->extension='.jpg';
				      $image->save();
				    }
 				
 		
 			$users=new DB\SQL\Mapper(F3::get('dB'),'users'); // Connexion à la table image
 			$users->copyFrom('POST'); // on récupère le POST
 			$users->password=md5($password);
 			$users->fk_id_image=$image->id_image;
			$users->save(); // on sauvegarde
	}

	function inscriptionfb($password){

 			$date_creation=date_default_timezone_set('Europe/Paris'); echo date("Y-m-d H:i:s");
 			$last_connection=date_default_timezone_set('Europe/Paris'); echo date("Y-m-d H:i:s");
 			$users=new DB\SQL\Mapper(F3::get('dB'),'users'); // Connexion à la table image
 			$users->login='fb1';
 			$users->email='fb';
 			$users->password=md5($password);
 			$users->name='fb';
 			$users->firstname='fb';
 			$users->adress='fb';
 			$users->phone='fb';
 			$users->date_creation=$date_creation;
 			$users->last_connection=$last_connection;
 			$users->level='2';
 			$users->fk_id_image='10';
			$users->save(); // on sauvegarde

			
	}

	function forgetpassword($login,$password){
			$users=new DB\SQL\Mapper(F3::get('dB'),'users'); // Connexion à la table image
	 		$users->load(array('login=?',$login));
	 		$users->password=md5($password); // on récupère le POST
			$users->update(); // on sauvegarde

			return $log = F3::get('dB')->exec("SELECT * FROM users WHERE login = '".$login."'");

			F3::reroute('/user');
	}

	function connexion($login,$password){
			return $recupMdpId = F3::get('dB')->exec("SELECT * FROM users WHERE login = '".$login."' AND password = '".$password."'");

	}

	function infoUserCo($id){
			// return $infoUserCo = F3::get('dB')->exec("SELECT * FROM users WHERE id_users = '".$id."'");
			return $infoUserCo = F3::get('dB')->exec("SELECT U.id_users, U.login,U.name,U.firstname,U.email,U.adress,U.sexe,U.born,U.city,U.CP,U.phone,U.date_creation,U.last_connection,U.level,U.name,I.id_image,I.name as imageUser, I.extension FROM users U, image I WHERE U.fk_id_image = I.id_image AND U.id_users ='".$id."'");

	}

	function avis($idUser){
		    $avis =new DB\SQL\Mapper(F3::get('dB'),'avis');
            $filter = 'fk_id_users = '.$idUser;
            $option = array(
                'group'=>NULL,
                'order'=>NULL
 
            );
            return $avisUser = $avis->afind($filter,$option);

	}
	function EditInfoUser($id,$id_image,$password){

			$img=Web::instance()->receive();
			    if($img){
			      $image=new DB\SQL\Mapper(F3::get('dB'),'image');
			      $image->load(array('id_image=?',$id_image));
			      $image->name=$img[0];
			      $image->update();
			    }

			$users=new DB\SQL\Mapper(F3::get('dB'),'users'); // Connexion à la table image
	 		$users->load(array('id_users=?',$id));
	 		$users->copyFrom('POST'); // on récupère le POST
	 		$users->password=md5($password);
			$users->update(); // on sauvegarde
			F3::reroute('/user/edit');
	}
	function __destruct(){

	}
}
