<?php
$f3=require('app/Helpers/Library/base.php');

$f3->config('config/globals.ini');
$f3->config('config/routes.ini');

$f3->set('dB',new DB\SQL('mysql:host='.$f3->get('db_host').';dbname='.$f3->get('db_server'),$f3->get('db_user'),$f3->get('db_pw')));

$f3->run();
