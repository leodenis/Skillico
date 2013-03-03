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
		echo $view->render('monCompte.php');
	}


	function formulaire_inscription(){
		echo $view->render('formulaireInscription.html'); 
	}

	function deposerUneAnnonce(){
		echo $view->render('deposer.html'); 
	}

	function enchereDetail(){
		echo $view->render('enchere_detail.html');
	}

	function __destruct(){

	}



}