<?php 

class User_controller{
	function __construct(){

	}

	function home(){ 
		//echo Views::instance()->render(index.html)
		$view=new View(); 
		echo $view->render('home.html'); 	
	}

	function __destruct(){

	}

}