<?php
class UserTest_controller{

  function __construct()
  {
    
  }
  
  function user(){
    $units=array(
      array('name'=>'Pumir','extension'=>'jpg'),
    );
    $test=new \Test;
    foreach($units as $unit){
      F3::mock('POST /user',$unit);
      $test->expect(
        !F3::get('errorMsg'),
        'POST : ' .$unit['name'].' | '.$unit['extension'].' => '.F3::stringify(F3::get('errorMsg'))
        );
    }
   F3::set('results',$test->results());
   echo Views::instance()->render('test.html');
  }
  
  
  
  
}
?>