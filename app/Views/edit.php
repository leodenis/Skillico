<?php echo 'Bienvenue ' .F3::get('SESSION.user').' '; ?>
 <form action="" method="post" enctype="multipart/form-data">
       <span class="error"></span>
        <input type="text" name="login" placeholder="login" value="<?php echo $infoUserCo[0][login]; ?>"/>
        <input type="text" name="email" placeholder="email" value="<?php echo $infoUserCo[0][email]; ?>"/>
        <input type="text" name="password" placeholder="password" value=""/>
        <input type="text" name="password2" placehorlder="Veuillez confirmer votre mot de passe" value=""/> 
        <input type="text" name="name" placeholder="name" value="<?php echo $infoUserCo[0][name]; ?>"/>
        <input type="text" name="firstname" placeholder="firstname" value="<?php echo $infoUserCo[0][firstname]; ?>"/>
        <input type="text" name="adress" placeholder="adress" value="<?php echo $infoUserCo[0][adress]; ?>"/>
        <input type="text" name="phone" placeholder="phone" value="<?php echo $infoUserCo[0][phone]; ?>"/>
         <input type="hidden" name="date_creation" placeholder="date_creation" value="<?php date_default_timezone_set('Europe/Paris'); echo date("Y-m-d H:i:s"); ?>"/>
        <input type="hidden" name="last_connection" placeholder="last_connection" value="<?php date_default_timezone_set('Europe/Paris'); echo date("Y-m-d H:i:s"); ?>"/>
        <input type="text" name="level" placeholder="level" value=""/>
        <input type='file' name="image[]" />
        <input type="hidden" name="fk_id_image" value="2" />
        <input type="submit" value="save"/>
     </form>
