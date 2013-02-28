<?php 

class App_controller{
	function __construct(){

	}

	function home(){ 
		$id=F3::get('SESSION.user');
	    $id=$id[0]['id_users'];
		$User=new User();
		$InfoUser=$User->infoUserCo($id);
		F3::set('InfoUser',$InfoUser);
		echo Views::instance()->render('index.html');	
	}

	function renduPage(){
		$view=new View(); 
		echo $view->render('monCompte.php');
	}


	function formulaire_inscription(){
		$view=new View(); 
		echo $view->render('formulaireInscription.html'); 
	}

	function deposerUneAnnonce(){
		$view=new View(); 
		echo $view->render('deposer.html');
	}

	function enchereDetail(){
		$view=new View();
		echo $view->render('enchere_detail.html');
	}

	function __destruct(){

	}



}