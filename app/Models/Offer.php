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
            return $offer = $offer->find('visibility = 0 ',array('order'=>'id_offer DESC'));
	}

	/*
	*	RECUPERATION DES DETAILS DE L'OFFRE
	*/

	function getOfferDetails($idOffer){
	    $offer = F3::get('dB')->exec('SELECT * FROM offer WHERE id_offer = ' . $idOffer);
	    return $offer;
	}

    function getOfferUserDetails($idOffer){
        $offer = F3::get('dB')->exec('SELECT * FROM offer O, users U WHERE O.id_offer = ' . $idOffer.' AND O.fk_id_users_post = U.id_users');
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
                        'type'=>'required',
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
        *       RECUPERATION DES OFFRES Posté D'UN UTILISATEUR
        */

       function getOfferByUSerId($idUser){
            $offer =new DB\SQL\Mapper(F3::get('dB'),'offer');
            $filter = 'fk_id_users_post = '.$idUser;
            $option = array(
                'group'=>NULL,
                'order'=>NULL
 
            );
            return $offerList = $offer->afind($filter,$option);
	   }

              /*
        *       RECUPERATION DES OFFRES Posté D'UN UTILISATEUR
        */

       function getOfferByUSerIdAccomplite($idUser){
            $offer =new DB\SQL\Mapper(F3::get('dB'),'offer');
            $filter = 'fk_id_users_respond = '.$idUser;
            $option = array(
                'group'=>NULL,
                'order'=>NULL
 
            );
            return $offerListAccomplite = $offer->find($filter,$option);
       }
               /*
        *        RECUPERATION DES OFFRES répondu D'UN UTILISATEUR
        */

       function getOfferRespondByUSerId($idUser){
            $offer =new DB\SQL\Mapper(F3::get('dB'),'offer');
            $filter = 'fk_id_users_respond = '.$idUser;
            $option = array(
                'group'=>NULL,
                'order'=>NULL
 
            );
            return $offerRespond = $offer->find($filter,$option);
            // return Views::instance()->toJson($offerList,array('id_offer'=>'id_offer', 'title'=>'title','description'=>'description','beginning'=>'beginning','ending'=>'ending','price'=>'price','lat'=>'lat','lng'=>'lng','bid'=>'bid','fk_id_offer_duration'=>'fk_id_offer_duration','fk_id_offer_cat'=>'fk_id_offer_cat','fk_id_users_post'=>'fk_id_users_post','fk_id_users_respond'=>'fk_id_users_respond'));
       }
        

        function Search($page=NULL){
            $offer = new DB\SQL\Mapper(F3::get('dB'),'offer');
            $sql = 'SELECT o.id_offer, o.title, o.description, o.beginning, o.price, o.lat, o.lng, o.type FROM offer AS o WHERE visibility = 0';
            $post = F3::get('POST');
            if(isset($post) && $post != null){
                $sql .= $post['type'] == 'tous' ? '' : ' AND type = "'.$post['type'].'"';
                $sql .= isset($post['searchBarre']) && empty($post['searchBarre']) ? '' : ' AND o.title LIKE "%'.$post['searchBarre'].'%" OR o.description LIKE "%'.$post['searchBarre'].'%"'; 
                $sql .= ' AND o.price BETWEEN '. $post['priceRange'][0] .' AND '. $post['priceRange'][1];
                if(isset($post['cat'])){
                    $sql .= ' AND';
                    for ($i=0; $i < count($post['cat']) ; $i++) { 
                        $sql .= $i == 0 ? ' o.fk_id_offer_cat = '.$post['cat'][$i] : ' OR o.fk_id_offer_cat = '.$post['cat'][$i];
                    }
                }
            }
            if(empty($post['order'])){
                $sql .= ' ORDER BY '.$post['order'].' AND o.id_offer DESC';
            }else{
                $sql .= ' ORDER BY o.id_offer DESC';
            }
            $nb_page = ceil(count(F3::get('dB')->exec($sql))/10);
            // if($page!=NULL){
            //     $sql .= ' LIMIT 10 OFFSET '.$page;
            // }else{
            //     $sql .= ' LIMIT 0, 10';
            // }
            return array(F3::get('dB')->exec($sql),$nb_page,$page,$post,$sql);
        }
       /*
        * Recuperation pour creer les marqueurs
        */
    function postulate($idOffer,$idUser){
        $offer=new DB\SQL\Mapper(F3::get('dB'),'offer');
        $offer->load(array('id_offer=?',$idOffer));
        $offer->visibility=1;
        $offer->fk_id_users_respond=$idUser;
        $offer->update();
    } 

    function validate($idOffer){
        $offer=new DB\SQL\Mapper(F3::get('dB'),'offer');
        $offer->load(array('id_offer=?',$idOffer));
        $offer->visibility=2;
        $offer->update();    
    }

    function reqLatLng(){
    }
}

?>