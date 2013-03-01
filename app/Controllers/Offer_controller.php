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
              if(empty($_POST['searchHome'])){
                }else{
                  $searchHome =$_POST['searchHome'];
                  F3::set('searchHome',$searchHome);

                }
                $offers = Offer::instance()->getOfferListe();
                $User=new User();
                $id=F3::get('SESSION.user');
                $id=$id[0]['id_users'];
                $InfoUser=$User->infoUserCo($id);
                F3::set('InfoUser',$InfoUser);
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

  function detailsOffer(){
    $idOffer=F3::get('PARAMS.IdOffer');
    $Offer=new Offer();
    $offer=$Offer->getOfferUserDetails($idOffer);
    F3::set('offer',$offer);
    $id=F3::get('SESSION.user');
    $id=$id[0]['id_users'];
    $User=new User();
    $InfoUser=$User->infoUserCo($id);
    F3::set('InfoUser',$InfoUser);
    echo Views::instance()->render('annonce_detail.html');

  }

  function postulate(){
    $idOffer=F3::get('PARAMS.IdOffer');
    $idUser=F3::get('PARAMS.IdUser');
    $Offer=new Offer();
    $postulate=$Offer->postulate($idOffer,$idUser);
    F3::reroute('/monCompte');

  }

  function validate(){
      $idOffer=F3::get('PARAMS.IdOffer');
      $Offer=new Offer();
      $validate=$Offer->validate($idOffer);
      F3::reroute('/monCompte');


  }

  // function paypal(){
  //     $idOffer=3;
  //     $successPaiement = PaypalSuccess::instance()->success();
  //     if($successPaiement == 'good'){
  //       $offer=new DB\SQL\Mapper(F3::get('dB'),'offer');
  //       $offer->load(array('id_offer=?',$idOffer));
  //       $offer->visibility=7;
  //       $offer->update(); 
  //     }
  //     else{
  //       echo 'ok';
  //       die();
  //     }
  // }

    function paypal(){
      $offer_id = PaypalSuccess::instance()->success();
      if (isset($offer_id)) {
          $Offer=new Offer();
          $recupPaypal=$Offer->paypal($offer_id);
      }

  }

  function searchHome(){
      F3::set('searchHome',$searchHome);
      echo Views::instance()->render('p');
      F3::reroute('/offer');
  }

}