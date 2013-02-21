<?php 

class App_controller{
	function __construct(){

	}

	function home(){ 
		//echo Views::instance()->render(index.html)
		$view=new View(); 
		echo $view->render('index.html'); 	
	}

	function __destruct(){

	}

}