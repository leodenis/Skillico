
<?php 
// $tableauInfoUser=array_slice($InfoUserOffer, 0, 1);
// $tableauInfoUserOffer=unset($InfoUserOffer[0]);
$tableauInfoUser=array_shift($InfoUserOffer);
echo '<pre>';
print_r($tableauInfoUser);
print_r($InfoUserOffer);
echo '</pre>';
if(F3::get('SESSION.user')){
 	echo 'Bienvenue ' .F3::get('SESSION.user').' ';
  echo '<a href="user/deconnexion">Déconnexion</a>';
}
else{
	echo '<a href="user/inscription">Inscription</a>';
    echo '<a href="user/connexion">connexion</a>';
}
 ?>
