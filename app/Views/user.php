
<?php 



if(F3::get('SESSION.user')){
 	echo 'Bienvenue ' .F3::get('SESSION.user').' ';
  echo '<a href="user/deconnexion">Déconnexion</a>';
}
else{
	echo '<a href="user/inscription">Inscription</a>';
    echo '<a href="user/connexion">connexion</a>';
}
 ?>

 <?php 
echo $infoUserCo[0][firstname];
   ?>