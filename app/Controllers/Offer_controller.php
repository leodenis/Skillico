<?php 

class Offer_controller{
	
	function __construct(){

	}

	function get(){ 
           $offers = Offer::instance()->getOfferListe();
            F3::set('offers',$offers);
            echo Views::instance()->render('annonces.html');
	}

	function post(){ 
           Offer::instance()->postOffer();
	}
        
	function update(){ 
            Offer::instance()->updateOffer();
	}
        
	function delete(){ 
            Offer::instance()->deleteOffer();
	}
}