<?php 

class User_controller{
	function __construct(){

	}

	function get(){ 

	}

	function post(){
		 F3::set('errorMsg',null);
	    $check=array(
	      'name'=>'required',
	      'extension'=>'required'
	    );
	    $error=Datas::instance()->check(F3::get('POST'),$check);
	    if($error){
	      F3::set('errorMsg',$error);
	    }
	    else{	
	    	echo 'OK';
	    	//Ajout dans la base de donnée
	    	
			$image=new DB\SQL\Mapper(F3::get('dB'),'image'); // Connexion à la table image
			$image->copyFrom('POST'); // on récupère le POST
			$image->save(); // on sauvegarde
	      //$user=new App;
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