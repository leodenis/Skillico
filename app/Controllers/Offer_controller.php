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
                F3::set('offers',$offers);
                echo Views::instance()->render('annonces.php');  
           }
           
	}

	function post(){ 
            Offer::instance()->postOffer();
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

  function searchHome(){
      F3::set('searchHome',$searchHome);
      echo Views::instance()->render('p');
      F3::reroute('/offer');
  }

}