<?php

class Offer extends Prefab
{
	
/**
    User from username
    @return array
    @param $username string
  **/
	function __construct()
	{
        // $db = new DB\SQL('mysql:host='.F3::get('db_host').';port=3306;dbname='.F3::get('db_server'), F3::get('db_user'), F3::get('db_password'));
        // $this->users       = new DB\SQL\Mapper($db, 'users');
        // $this->users_trips = new DB\SQL\Mapper($db, 'users_trips');
	}

/**
    Get List offers
    @return array
  **/
	function getOfferListe(){
        $offer =new DB\SQL\Mapper(F3::get('dB'),'offer');
        return $offer = $offer->find('visibility = 0 ',array('order'=>'id_offer DESC'));
	}

/**
    Get details offer
    @return array
    @param $idOffer number
  **/
	function getOfferDetails($idOffer){  
        $offer= new DB\SQL\Mapper(F3::get('dB'),'offer');
        return $offer->exec('SELECT * FROM (offer AS O INNER JOIN users AS U ON O.fk_id_users_post = U.id_users) INNER JOIN offer_cat AS c ON  O.fk_id_offer_cat = c.id_offer_cat WHERE O.id_offer = '.$idOffer);
	}

/**
    Get user list offers
    @return array
    @param $idOffer number
  **/
    function getOfferUserDetails($idOffer){
        $offer = F3::get('dB')->exec('SELECT * FROM offer AS O INNER JOIN users AS U ON O.id_offer = ' . $idOffer.' WHERE O.fk_id_users_post = U.id_users');
        return $offer;
    }

/**
    Get duration list
    @return array
**/

    function getDurationList(){
        $offerDuration = new DB/SQL/Mapper(F3::get('dB'),'offer_duration');
        $durationList = $offerDuration->find();
        return Views::instance()->toJson($durationList,array('id_offer_duration'=>'id_offer_duration','title'=>'title','description'=>'desccription'));
    }

/**
    Get category list
    @return array
**/
    function getCategoryList(){ $catList=new DB\SQL\Mapper(F3::get('dB'),'offer_cat');
        return $catList->afind();
    }

/**
    Post an offer
    @return void
**/
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
            echo $offer->get('id_offer'); 
        }
    }

/**
    Update an offer
    @return void
**/
    function updateOffer(){
        F3::set('errorMsg',null);	
        $offer=new DB\SQL\Mapper(F3::get('dB'),'offer');
        $offer->load('id_offer = '.$_POST['id_offer']);
        $offer->copyFrom('POST');
        $offer->update();
    }

/**
    Disable visibility of an offer
    @return void
**/
   function deleteOffer(){
        F3::set('errorMsg',null);	
        $offer=new DB\SQL\Mapper(F3::get('dB'),'offer');
        $offer->load('id_offer = '.$_POST['id_offer']);
        $offer->copyFrom('POST');
        $offer->update();
   }
   
/**
    Get user's offers
    @param $idUser int
    @return array
**/
   function getOfferByUSerId($idUser){
        $offer =new DB\SQL\Mapper(F3::get('dB'),'offer');
        $filter = 'fk_id_users_post = '.$idUser;
        $option = array(
            'group'=>NULL,
            'order'=>NULL

        );
        return $offerList = $offer->afind($filter,$option);
   }

/**
    Get user's offers where he respond
    @param $idUser int
    @return array
**/
   function getOfferRespondByUSerId($idUser){
        $offer =new DB\SQL\Mapper(F3::get('dB'),'offer');
        $filter = 'fk_id_users_respond = '.$idUser;
        $option = array(
            'group'=>NULL,
            'order'=>NULL

        );
        return $offerRespond = $offer->afind($filter,$option);
        // return Views::instance()->toJson($offerList,array('id_offer'=>'id_offer', 'title'=>'title','description'=>'description','beginning'=>'beginning','ending'=>'ending','price'=>'price','lat'=>'lat','lng'=>'lng','bid'=>'bid','fk_id_offer_duration'=>'fk_id_offer_duration','fk_id_offer_cat'=>'fk_id_offer_cat','fk_id_users_post'=>'fk_id_users_post','fk_id_users_respond'=>'fk_id_users_respond'));
   }

/**
    Search in the offers
    @param $pageint
    @return array
**/
    function Search($page){
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
        if(empty($post['order']) && isset($post['order'])){
            $sql .= ' ORDER BY id_offer DESC';
        }else{
            $sql .= ' ORDER BY '.$post['order'].' AND id_offer DESC';
        }
        $nb_page = ceil(count(F3::get('dB')->exec($sql))/10);

        // if($page){
        //     $sql .= ' LIMIT 10 OFFSET '.$page;
        // }else{
        //     $sql .= ' LIMIT 0, 10';
        // }
        return array(F3::get('dB')->exec($sql),$nb_page,$page,$post,$sql);
    }

/**
    Postulate to an offer
    @param $idOffer int
    @param $idUser int
    @return void
**/
    function postulate($idOffer,$idUser){
        $offer=new DB\SQL\Mapper(F3::get('dB'),'offer');
        $offer->load(array('id_offer=?',$idOffer));
        $offer->visibility=1;
        $offer->fk_id_users_respond=$idUser;
        $offer->update();
    } 

/**
    Payment done by the other user
    @param $id int
    @return array
**/
    function PaiementRecu($id){
        $offer =new DB\SQL\Mapper(F3::get('dB'),'offer');
        $filter = 'payment = 2 AND fk_id_users_respond='.$id;
        $option = array(
            'group'=>NULL,
            'order'=>NULL
 
        );
        return $PaiementRecu = $offer->afind($filter,$option);
    }   

/**
    My payment done 
    @param $id int
    @return array
**/
    function PaiementDonnee($id){
        $offer =new DB\SQL\Mapper(F3::get('dB'),'offer');
        $filter = 'payment = 2 AND fk_id_users_post='.$id;
        $option = array(
            'group'=>NULL,
            'order'=>NULL
 
        );
        return $PaiementRecu = $offer->afind($filter,$option);
    }

/**
    Validation of the service
    @param $idOffer
    @return void
**/
    function validate($idOffer){
        $offer=new DB\SQL\Mapper(F3::get('dB'),'offer');
        $offer->load(array('id_offer=?',$idOffer));
        $offer->visibility=2;
        $offer->update();    
    }

/**
    Post avis
    @param $idOffer
    @return void
**/
    function postAvis($idOffer){
        $avis=new DB\SQL\Mapper(F3::get('dB'),'avis');
        $avis->copyFrom('POST'); 
        $avis->save();


        $offer=new DB\SQL\Mapper(F3::get('dB'),'offer');
        $offer->load(array('id_offer=?',$idOffer));
        $offer->payment=2;
        $offer->update(); 
    }


/**
    Payment by paypal
    @param $offer_id
    @return void
**/
    function paypal($offer_id){
        $offer=new DB\SQL\Mapper(F3::get('dB'),'offer');
        $offer->load(array('id_offer=?',$offer_id));
        $offer->visibility=3;
        $offer->payment=1;
        $offer->update(); 
    }

}

?>