<?php 

class App_controller{
	function __construct(){

	}

	function home(){ 
		//echo Views::instance()->render(index.html)
		$view=new View(); 
		echo $view->render('index.html'); 	
	}

	function renduPage(){
		$view=new View(); 
		echo $view->render('monCompte.php');
	}

	function offer_detail(){
		$view=new View(); 
		echo $view->render('annonce_detail.html'); 
	}

	function formulaire_inscription(){
		$view=new View(); 
		echo $view->render('formulaireInscription.html'); 
	}

	function deposerUneAnnonce(){
		$view=new View(); 
		echo $view->render('deposer.html'); 
	}

	function __destruct(){

	}



}