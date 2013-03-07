<?php 

class App_controller{
	function __construct(){

	}

	function home(){ 
		$id=F3::get('SESSION.user');
	    $id=$id[0]['id_users'];
		$User=new User();
		$InfoUserCo=$User->infoUserCo($id);
		F3::set('InfoUserCo',$InfoUserCo);
		echo Views::instance()->render('index.html');	
	}

	function renduPage(){
		echo Views::instance()->render('monCompte.php');	
	}

	function formulaire_inscription(){
		echo Views::instance()->render('formulaireInscription.html');	
	}

	function deposerUneAnnonce(){
		echo Views::instance()->render('deposer.html');	
	}

	function error()
	{
		echo Views::instance()->render('404.html');	

	}

	function enchereDetail(){
		echo Views::instance()->render('enchere_detail.html');	
	}

	function CGU(){
		echo Views::instance()->render('cgu.html');
	}

	function __destruct(){

	}



}