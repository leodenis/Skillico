
<?php 
// $tableauInfoUser=array_slice($InfoUserOffer, 0, 1);
// $tableauInfoUserOffer=unset($InfoUserOffer[0]);
// $tableauInfoUser=array_shift($InfoUserOffer);
// echo '<pre>';
// print_r($tableauInfoUser);
// print_r($InfoUserOffer);
// echo '</pre>';
// print_r($infoUserCo);
if(F3::get('SESSION.user')){
 	echo 'Bienvenue ' .F3::get('SESSION.user').' ';
  echo '<a href="user/deconnexion">Déconnexion</a>';
  echo '<a href="user/edit">Editer le profil</a>';
?>
 <form action="" method="post" enctype="multipart/form-data">
       <span class="error"></span>
        <input type="text" name="login" placeholder="login" value="<?php echo $infoUserCo[0][login]; ?>"/>
        <input type="text" name="email" placeholder="email" value="<?php echo $infoUserCo[0][email]; ?>"/>
        <input type="text" name="name" placeholder="name" value="<?php echo $infoUserCo[0][name]; ?>"/>
        <input type="text" name="firstname" placeholder="firstname" value="<?php echo $infoUserCo[0][firstname]; ?>"/>
        <input type="text" name="adress" placeholder="adress" value="<?php echo $infoUserCo[0][adress]; ?>"/>
        <input type="text" name="phone" placeholder="phone" value="<?php echo $infoUserCo[0][phone]; ?>"/>
        <input type="text" name="level" placeholder="level" value=""/>
        <input type='file' name="image[]" />
        <input type="hidden" name="fk_id_image" value="2" />
        <input type="submit" value="save"/>
 </form>
<img src="../../Skillico/public/images/<?php echo $infoUserCo[0][name]; ?>" />
<?php
}
else{
	echo '<a href="user/inscription">Inscription</a></br>'; 
    echo '<a href="user/connexion">connexion</a></br>';
    echo "<a href='user/inscriptionfb'>S'inscrire avec Facebook</a></br>";
    echo "<a href='user/forgetpassword'>Mot de passe oublié</a></br>";
}
 ?>


