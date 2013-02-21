<?php 

class Offer_controller{
	
	function __construct(){

	}

	function get(){ 
           $id=F3::get('PARAMS.id');
           if($id){
                $offer = Offer::instance()->getOfferDetails($id);
                F3::set('offer',$offer);
                echo Views::instance()->render('annonces_detail.html');  // A FINIR AVEC L'INTE
           }else{
                $offers = Offer::instance()->getOfferListe();
                F3::set('offers',$offers);
                echo Views::instance()->render('annonces.php');  
           }
           
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

  function search(){
    $search=F3::get('PARAMS.search');
    $Offer=new Offer();
    $offer=$Offer->Search($search);
    F3::set('offer',$offer);
    echo Views::instance()->render('search.php');

  }
}