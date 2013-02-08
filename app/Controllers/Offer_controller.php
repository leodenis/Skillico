<?php 

class Offer_controller{
	
	function __construct(){

	}

	function get(){ 
           $offerListe = Offer::instance()->getOfferListe();
            print_r($offerListe);
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