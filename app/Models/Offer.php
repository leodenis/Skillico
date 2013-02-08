<?php

class Offer extends Prefab
{
	
	function __construct()
	{
	}


	/*
	*	RECUPERATION DE LA LISTE DES OFFRES
	*/

	function getOfferListe(){
	    $offer = F3::get('dB')->exec('SELECT * FROM offer');
	    return Views::instance()->toJson($offer,array('title'=>'title','description'=>'description','beginning'=>'beginning','ending'=>'ending','price'=>'price','lat'=>'lat','lng'=>'lng','bid'=>'bid','fk_id_offer_duration'=>'fk_id_offer_duration','fk_id_offer_cat'=>'fk_id_offer_cat','fk_id_users_post'=>'fk_id_users_post','fk_id_users_respond'=>'fk_id_users_respond'));
	}

	/*
	*	RECUPERATION DES DETAILS DE L'OFFRE
	*/

	function getOfferDetails($idOffer){
	    $offer = F3::get('dB')->exec('SELECT * FROM offer WHERE id_offer = ' . $idOffer);
	    return Views::instance()->toJson($offer,array('title'=>'title','description'=>'description','beginning'=>'beginning','ending'=>'ending','price'=>'price','lat'=>'lat','lng'=>'lng','bid'=>'bid','fk_id_offer_duration'=>'fk_id_offer_duration','fk_id_offer_cat'=>'fk_id_offer_cat','fk_id_users_post'=>'fk_id_users_post','fk_id_users_respond'=>'fk_id_users_respond'));
	}

	/*
	*	POSTE D'UNE OFFRE
	*/
        
        function postOffer(){
            F3::set('errorMsg',null);
	    $check=array(
                    'title'=>'required',
                    'description'=>'required',
                    'price'=>'required',
                    'lat'=>'required',
                    'lng'=>'required',
                    'fk_id_offer_duration'=>'required',
                    'fk_id_offer_cat'=>'required',
                    'fk_id_users_post'=>'required'
            );
	    $error=Datas::instance()->check(F3::get('POST'),$check);
	    if($error){
	      F3::set('errorMsg',$error);
	    }
	    else{	
                $offer=new DB\SQL\Mapper(F3::get('dB'),'offer');
                $offer->copyFrom('POST'); 
                $offer->save();
	    	echo 'OK'; 
	    }
        }
        
        /*
         *      UPDATE DE L'OFFRE
         */
        
        function updateOffer(){
            F3::set('errorMsg',null);	
            $offer=new DB\SQL\Mapper(F3::get('dB'),'offer');
            $offer->load('id_offer = '.$_POST['id_offer']);
            $offer->copyFrom('POST');
            $offer->update();
        }


        /*
	*	DELETE D'UNE OFFRE ( CHANGEMENT D'ÉTAT DE L'ENABLE)
	*/
        
       function deleteOffer(){
            F3::set('errorMsg',null);	
            $offer=new DB\SQL\Mapper(F3::get('dB'),'offer');
            $offer->load('id_offer = '.$_POST['id_offer']);
            $offer->copyFrom('POST');
            $offer->update();
       }
        
}

?>