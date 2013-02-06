<?php 

class Test_controller{
	function __construct(){

	}

        function offerPost(){
            $units=array(
                    array(
                            'title'=>'Test post',
                            'description'=>'Deuxieme test de description, et je pense que je vais être a cour d\'idée assez rapidement.',
                            'beginning'=>'',
                            'ending'=>'2013-05-07',
                            'price'=>'250',
                            'lat'=>'2.3513513513513',
                            'lng'=>'42.353535135135',
                            'bid'=>'',
                            'fk_id_offer_duration'=>'1',
                            'fk_id_offer_cat'=>'1',
                            'fk_id_users_post'=>'2',
                            'fk_id_users_respond'=>''
                    ),
                    array(
                            'title'=>'test 3',
                            'description'=>'Deuxieme test de description, et je pense que je vais être a cour d\'idée assez rapidement.',
                            'beginning'=>'',
                            'ending'=>'2013-05-07',
                            'price'=>'250',
                            'lat'=>'2.3513513513513',
                            'lng'=>'42.353535135135',
                            'bid'=>'',
                            'fk_id_offer_duration'=>'1',
                            'fk_id_offer_cat'=>'1',
                            'fk_id_users_post'=>'2',
                            'fk_id_users_respond'=>''
                    )
             );
            $test=new \Test;
            foreach($units as $unit){
                F3::mock('POST /offer',$unit);
                $test->expect(
                    !F3::get('errorMsg'),
                    'POST : ' .$unit['title'].' | '.$unit['description'].' | '.$unit['beginning'].' | '.$unit['ending'].' | '.$unit['price'].' | '.$unit['lat'].' | '.$unit['lng'].' | '.$unit['bid'].' | '.$unit['fk_id_offer_duration'].' | '.$unit['fk_id_offer_cat'].' | '.$unit['fk_id_users_post'].' => '.F3::stringify(F3::get('errorMsg'))
                );
            }
            F3::set('results',$test->results());
            echo Views::instance()->render('test.html');
        }

}