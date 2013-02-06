<?php

class Offer
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
}

?>