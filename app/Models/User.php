<?php 
class User extends Prefab{
	function __construct(){

	}

/**
    Inscription
    @param $password varchar
    @param $born int
    @return array
**/
	function inscription($password,$born){
		   $img=Web::instance()->receive();
				    if($img){
				      $image=new DB\SQL\Mapper(F3::get('dB'),'image');
				      $image->name='public/images/'.$img[0];
				      $image->extension='.jpg';
				      $image->save();
				    }else{
				      $image=new DB\SQL\Mapper(F3::get('dB'),'image');
				      $image->name='public/images/photodebase.png';
				      $image->extension='.jpg';
				      $image->save();
				    }
 				
 		
 			$users=new DB\SQL\Mapper(F3::get('dB'),'users'); 
 			$users->copyFrom('POST'); 
 			$users->password=md5($password);
 			$users->born=$born;
 			$users->fk_id_image=$image->id_image;
			$users->save(); 
	}

/**
    Inscription by FacebookConnect
    @param $username varchar
    @param $email varchar
    @param $name varchar
    @param $firstname varchar
    @param $password varchar
    @param $gender varchar
    @param $city varchar
    @param $born varchar
    @param $imgProfil varchar
    @return void
    @return array
**/
	function inscriptionfb($username,$email,$name,$firstname,$password,$gender,$city,$born,$imgProfil){
			$recupMdpId = F3::get('dB')->exec("SELECT * FROM users WHERE login = '".$username."'");

            if (empty($recupMdpId)) {
	            $image=new DB\SQL\Mapper(F3::get('dB'),'image');
				$image->name=$imgProfil;
				$image->extension='.jpg';
				$image->save();
					    
	 			$date_creation=date_default_timezone_set('Europe/Paris'); echo date("Y-m-d H:i:s");
	 			$last_connection=date_default_timezone_set('Europe/Paris'); echo date("Y-m-d H:i:s");
	 			$users=new DB\SQL\Mapper(F3::get('dB'),'users'); // Connexion à la table image
	 			$users->login=$username;
	 			$users->email=$email;
	 			$users->password=md5($password);
	 			$users->name=$name;
	 			$users->firstname=$firstname;
	 			$users->date_creation=$date_creation;
	 			$users->sexe=$gender;
	 			$users->born=$born;
	 			$users->city=$city;
	 			$users->fk_id_image=$image->id_image;
				$users->save(); // on sauvegarde

				return $recupMdpId = F3::get('dB')->exec("SELECT * FROM users WHERE login = '".$username."'");
            }else{
           		return $recupMdpId = F3::get('dB')->exec("SELECT * FROM users WHERE login = '".$username."'");
            }	
	}

/**
    Forget Password
    @param $login varchar
    @param $password varchar
    @return void
    @return array
**/
	function forgetpassword($login,$password){
			$users=new DB\SQL\Mapper(F3::get('dB'),'users'); // Connexion à la table image
	 		$users->load(array('login=?',$login));
	 		$users->password=md5($password); // on récupère le POST
			$users->update(); // on sauvegarde
		   
		    $log=new DB\SQL\Mapper(F3::get('dB'),'users');
    		return $log->afind(array('login=?',$login));

	}

/**
	Connexion
    @param $login varchar
    @param $password varchar
    @return array
**/
	function connexion($login,$password){
			$recupMdpId=new DB\SQL\Mapper(F3::get('dB'),'users');
    		return $recupMdpId->afind(array('login=? and password=?',$login,$password));

	}

/**
	Recover Information who is connect
    @param $id int
    @return array
**/

	function infoUserCo($id){
			return $infoUserCo = F3::get('dB')->exec("SELECT U.id_users, U.login,U.name,U.firstname,U.email,U.adress,U.sexe,U.born,U.city,U.CP,U.phone,U.date_creation,U.last_connection,U.level,U.name,I.id_image,I.name as imageUser, I.extension FROM users AS U INNER JOIN image AS I ON U.fk_id_image = I.id_image WHERE U.id_users ='".$id."'");
	}

/**
	Recover user avis 
    @param $idUser int
    @return array
**/

	function avis($idUser){
			$avisUser=new DB\SQL\Mapper(F3::get('dB'),'avis');
    		return $avisUser->afind(array('fk_id_users=?',$idUser));
	}

/**
	Edit Information of the user
    @param $id int
    @param $id_image int
    @param $password varchar
    @param $born int
    @return void
**/

	function EditInfoUser($id,$id_image,$password,$born){

			$img=Web::instance()->receive();
			    if($img){
			      $image=new DB\SQL\Mapper(F3::get('dB'),'image');
			      $image->load(array('id_image=?',$id_image));
			      $image->name='public/images/'.$img[0];
			      $image->update();
			    }

			$users=new DB\SQL\Mapper(F3::get('dB'),'users'); // Connexion à la table image
	 		$users->load(array('id_users=?',$id));
	 		$users->copyFrom('POST'); // on récupère le POST
	 		$users->password=md5($password);
	 		$users->born=$born;
			$users->update(); // on sauvegarde
			F3::reroute('/user/edit');
	}
	function __destruct(){

	}
}
