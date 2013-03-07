<?php 

class App_controller{
	function __construct(){

	}

/**
    App Error
    @return void
**/
	function error()
	{	
		$id=F3::get('SESSION.user');
	    $id=$id[0]['id_users'];
		$User=new User();
		$InfoUserCo=$User->infoUserCo($id);
		F3::set('InfoUserCo',$InfoUserCo);
		echo Views::instance()->render('404.html');	
	}
/**
    App home
    @return void
**/
	function home(){ 
		$id=F3::get('SESSION.user');
	    $id=$id[0]['id_users'];
		$User=new User();
		$InfoUserCo=$User->infoUserCo($id);
		F3::set('InfoUserCo',$InfoUserCo);
		echo Views::instance()->render('index.html');	
	}
/**
    App renduPage
    @return void
**/
	function renduPage(){
		echo Views::instance()->render('monCompte.php');	
	}
/**
    App formulaire_inscription
    @return void
**/
	function formulaire_inscription(){
		echo Views::instance()->render('formulaireInscription.html');	
	}
/**
    App deposerUneAnnonce
    @return void
**/
	function deposerUneAnnonce(){
		echo Views::instance()->render('deposer.html');	
	}
/**
    App enchereDetail
    @return void
**/
	function enchereDetail(){
		echo Views::instance()->render('enchere_detail.html');	
	}
/**
    App CGU
    @return void
**/
	function CGU(){
		echo Views::instance()->render('cgu.html');
	}

	function __destruct(){

	}



}