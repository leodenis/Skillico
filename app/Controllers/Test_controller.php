<?php 

class Test_controller{
	function __construct(){

	}

        function offerPost(){
            $units=array(
                    array(
                            'title'=>'Ceci est un test.',
                            'description'=>'Ceci est le dernier test que ferai car la planete est prete a explosé. Et je vais pas sauver le monde bande de b****',
                            'ending'=>'',
                            'price'=>'4000000',
                            'lat'=>'2.3513513513513',
                            'lng'=>'42.353535135135',
                            'fk_id_offer_duration'=>'1',
                            'fk_id_offer_cat'=>'1',
                            'fk_id_users_post'=>'2'
                    )
             );
            $test=new \Test;
            foreach($units as $unit){
                F3::mock('POST /offer',$unit);
                $test->expect(
                    !F3::get('errorMsg'),
                    'POST : ' .$unit['title'].' | '.$unit['description'].' | '.$unit['ending'].' | '.$unit['price'].' | '.$unit['lat'].' | '.$unit['lng'].' | '.$unit['fk_id_offer_duration'].' | '.$unit['fk_id_offer_cat'].' | '.$unit['fk_id_users_post'].' => '.F3::stringify(F3::get('errorMsg'))
                );
            }
            F3::set('results',$test->results());
            echo Views::instance()->render('test.html');
        }
        
        function offerUpdate(){
            
            $unit = array(
                'id_offer'=>'18',
                'title'=>'C\'la fin du monde on va tous crever',
                'description'=>'Aujourd\'hui, 19h37: je viens de croise la derniere personne vivante sur cette terre. Et je l\'ai tuer ca y est je suis seul.',
                'price'=>'4000'
            );
            $test=new \Test;
            F3::mock('POST /offer/edit',$unit);
            $test->expect(
                !F3::get('errorMsg'),
                'POST : ' .$unit['id_offer'].' | ' .$unit['title'].' | '.$unit['description'].' | '.$unit['price'].' => '.F3::stringify(F3::get('errorMsg'))
            );
            F3::set('results',$test->results());
            echo Views::instance()->render('test.html');
        }
        
        function offerDelete(){
            
            $unit = array(
                'id_offer'=>'25',
                'enable'=>'1'
            );
            $test=new \Test;
            F3::mock('POST /offer/delete',$unit);
            $test->expect(
                !F3::get('errorMsg'),
                'POST : ' .$unit['id_offer'].' | '.$unit['enable'].' => '.F3::stringify(F3::get('errorMsg'))
            );
            F3::set('results',$test->results());
            echo Views::instance()->render('test.html');
        }
}