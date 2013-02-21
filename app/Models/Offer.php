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
            $offer =new DB\SQL\Mapper(F3::get('dB'),'offer');
	    return $offer->find();;
	}

	/*
	*	RECUPERATION DES DETAILS DE L'OFFRE
	*/

	function getOfferDetails($idOffer){
	    $offer = F3::get('dB')->exec('SELECT * FROM offer WHERE id_offer = ' . $idOffer);
	    return Views::instance()->toJson($offer,array('title'=>'title','description'=>'description','beginning'=>'beginning','ending'=>'ending','price'=>'price','lat'=>'lat','lng'=>'lng','bid'=>'bid','fk_id_offer_duration'=>'fk_id_offer_duration','fk_id_offer_cat'=>'fk_id_offer_cat','fk_id_users_post'=>'fk_id_users_post','fk_id_users_respond'=>'fk_id_users_respond'));
	}
        
        /*
         * RECUPERATION DES DURATIONS DES OFFRES
         */

        function getDurationList(){
            $offerDuration = new DB/SQL/Mapper(F3::get('dB'),'offer_duration');
            $durationList = $offerDuration->find();
            return Views::instance()->toJson($durationList,array('id_offer_duration'=>'id_offer_duration','title'=>'title','description'=>'desccription'));
        }

        /*
         * RECUPERATION DES CATEGORY DES OFFRES
         */

        function getCategoryList(){
            $offerDuration = new DB/SQL/Mapper(F3::get('dB'),'offer_cat');
            $durationList = $offerDuration->find();
            return Views::instance()->toJson($durationList,array('id_offer_cat'=>'id_offer_cat','title'=>'title','description'=>'desccription','fk_id_image'=>'fk_id_image'));
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
       
       /*
        *       RECUPERATION DES OFFRES D'UN UTILISATEUR
        */

       function getOfferByUSerId($idUser){
            $offer =new DB\SQL\Mapper(F3::get('dB'),'offer');
            $filter = 'fk_id_users_post = '.$idUser.' OR fk_id_users_respond = '.$idUser;
            $option = array(
                'group'=>NULL,
                'order'=>NULL,
                'limit'=>5,
                'offset'=>2
            );
            $offerList = $offer->find($filter,$option);
	    return Views::instance()->toJson($offerList,array('id_offer'=>'id_offer', 'title'=>'title','description'=>'description','beginning'=>'beginning','ending'=>'ending','price'=>'price','lat'=>'lat','lng'=>'lng','bid'=>'bid','fk_id_offer_duration'=>'fk_id_offer_duration','fk_id_offer_cat'=>'fk_id_offer_cat','fk_id_users_post'=>'fk_id_users_post','fk_id_users_respond'=>'fk_id_users_respond'));
       }
       
       /*
        *       RECUPERATION DES OFFRES D'UN UTILISATEUR
        */
        
}

?>