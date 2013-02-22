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
	    return $offer;
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
        

        function Search($search){
        //Explosion de la chaine au caractère -
            $chaineExplode =  explode('-', $search);
            $firstRequest = $chaineExplode[0];
            $SecondeSearch = $chaineExplode[1];
            $SecondRequest = $chaineExplode[2];
            $price1=$chaineExplode[3]; 
            $price2=$chaineExplode[4]; 
            $requete='';

            //Créatop, des requêtes dynamiquement en fonction de ce que nous recevons
            
            if(isset($chaineExplode[5]) && isset($chaineExplode[6]) && isset($chaineExplode[7]) && isset($chaineExplode[8])){
                $requete="AND (C.title ='$chaineExplode[5]' OR C.title = '$chaineExplode[6]' OR C.title = '$chaineExplode[7]' OR '$chaineExplode[8]')";
            }
            else if(isset($chaineExplode[5]) && isset($chaineExplode[6]) && isset($chaineExplode[7])){
                $requete="AND (C.title ='$chaineExplode[5]' OR C.title = '$chaineExplode[6]' OR C.title = '$chaineExplode[7]')";
            }
            else if(isset($chaineExplode[5]) && isset($chaineExplode[6])){
                $requete="AND (C.title ='$chaineExplode[5]' OR C.title = '$chaineExplode[6]')";
            }
            else if(isset($chaineExplode[5])){
                 $requete="AND C.title ='$chaineExplode[5]'";
            }

            else{
                $requete='';
            }

            return $test = F3::get('dB')->exec("SELECT O.title, O.desciption, O.beginning, O.ending, O.price, C.title as cat FROM offer O,offer_cat C WHERE O.fk_id_offer_duration = C.id_offer_cat AND O.title LIKE '%$firstRequest%' AND O.type='$SecondRequest' AND O.price BETWEEN $price1 AND $price2 AND O.desciption LIKE '%$SecondeSearch%' $requete");        //  return $test = F3::get('dB')->exec("SELECT * FROM `oeuvre` WHERE title LIKE '%$firstRequest%' AND $SecondRequest");

        }
       /*
        * Recuperation pour creer les marqueurs
        */
       
       function reqLatLng(){
           
       }
}

?>