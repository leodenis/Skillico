<?php 

class Offer_controller{

    function __construct(){

    }

    /**
    Offer page
    @return void
    **/
    function get(){ 
        $id=F3::get('PARAMS.id');
        $page=F3::get('PARAMS.page');

        if($id){
            $offer = Offer::instance()->getOfferDetails($id);
            F3::set('offer',$offer);
            echo Views::instance()->render('annonce_detail.html');  // A FINIR AVEC L'INTE
        }else{
            // if(isset($_POST['searchHome'])){
            //   $searchHome =$_POST['searchHome'];
            //   F3::set('searchHome',$searchHome);
            // }
            if($page){
                $offers = Offer::instance()->search($page);
            }
            $offers = Offer::instance()->getOfferListe();
            $id=F3::get('SESSION.user');

            $InfoUser= User::instance()->infoUserCo($id[0]['id_users']);
            F3::set('InfoUser',$InfoUser);
            F3::set('offers',$offers);
            echo Views::instance()->render('annonces.php'); 
        }
    }

    /**
    Offer post
    @return void
    **/
    function post(){ 
        $offer = Offer::instance()->postOffer();
    }

    /**
    Offer update
    @return void
    **/  
    function update(){ 
        Offer::instance()->updateOffer();
    }

    /**
    Offer delete(set visibility to 0)
    @return void
    **/     
    function delete(){ 
        Offer::instance()->deleteOffer();
    }

    /**
    Offer search
    @return void
    **/
    function search(){
        $search=F3::get('PARAMS.search');
        $Offer=new Offer();
        $offer=$Offer->Search($search);
        F3::set('offer',$offer);
        echo Views::instance()->render('search.php');

    }

    /**
    Offer details
    @return void
    **/
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

    /**
    Apply to an offer
    @return void
    **/
    function postulate(){
        $idOffer=F3::get('PARAMS.IdOffer');
        $idUser=F3::get('PARAMS.IdUser');
        $Offer=new Offer();
        $postulate=$Offer->postulate($idOffer,$idUser);
        F3::reroute('/monCompte');

    }

    /**
    Validate the applicant to the offer
    @return void
    **/
    function validate(){
        $idOffer=F3::get('PARAMS.IdOffer');
        $Offer=new Offer();
        $validate=$Offer->validate($idOffer);
        F3::reroute('/monCompte');


    }

    /**
    Offer post
    @return void
    **/
    
    function paypal(){
        $offer_id = PaypalSuccess::instance()->success();
        if (isset($offer_id)) {
            $Offer=new Offer();
            $recupPaypal=$Offer->paypal($offer_id);
        }
    }
    
    function paypalSuccess(){
        F3::reroute('/monCompte');
    }

    function paypalCancel(){
        F3::reroute('/monCompte');
    }

    function postAvis(){
        Offer::instance()->postAvis();
        F3::reroute('/monCompte');
    }

    function reclamation(){
        switch(F3::get('VERB')){
            case 'GET':

            break;
            case 'POST':
                $subject=$_POST['subject'];
                $email=$_POST['email'];          
                $message=$_POST['message'];
                $user=$_POST['user']; 
                Mail::instance()->sendmailReclamation($subject,$email,$message,$user);
                F3::reroute('/monCompte');
            break;
        }
    }



}