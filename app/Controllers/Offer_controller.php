<?php 

class Offer_controller{
	
	function __construct(){

	}

	function get(){ 
		$offer = new Offer();
		$offerListe = $offer->getOfferListe();
		print_r($offerListe);
	}

	function post(){ 
            F3::set('errorMsg',null);
	    $check=array(
                    'title'=>'required',
                    'description'=>'required',
                    'beginning'=>'',
                    'ending'=>'',
                    'price'=>'required',
                    'lat'=>'required',
                    'lng'=>'required',
                    'bid'=>'',
                    'fk_id_offer_duration'=>'required',
                    'fk_id_offer_cat'=>'required',
                    'fk_id_users_post'=>'required',
                    'fk_id_users_respond'=>''
            );
	    $error=Datas::instance()->check(F3::get('POST'),$check);
	    if($error){
	      F3::set('errorMsg',$error);
	    }
	    else{	
                $offer=new DB\SQL\Mapper(F3::get('dB'),'offer'); // Connexion à la table image
                $offer->copyFrom('POST'); // on récupère le POST
                $offer->save();
	    	echo 'OK'; 
	    }
	}
}