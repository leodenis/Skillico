 <form action="" method="post" enctype="multipart/form-data">
       <span class="error"></span>
        <input type="text" name="login" placeholder="login" value=""/>
        <input type="text" name="email" placeholder="email" value=""/>
        <input type="password" name="password" placeholder="password" value=""/>
        <input type="password" name="password2" placehorlder="password" value=""/> 
        <input type="text" name="name" placeholder="name" value=""/>
        <input type="text" name="firstname" placeholder="firstname" value=""/>
        <input type="text" name="adress" placeholder="adress" value=""/>
        <input type="text" name="phone" placeholder="phone" value=""/>
         <input type="hidden" name="date_creation" placeholder="date_creation" value="<?php date_default_timezone_set('Europe/Paris'); echo date("Y-m-d H:i:s"); ?>"/>
        <input type="hidden" name="last_connection" placeholder="last_connection" value="<?php date_default_timezone_set('Europe/Paris'); echo date("Y-m-d H:i:s"); ?>"/>
        <input type="text" name="level" placeholder="level" value=""/>
        <input type='file' name="image[]" />
<!--         <input type="hidden" name="fk_id_image" value="4" />
 -->        <input type="submit" value="save"/>
     </form>

     <?php if($errorMsg['login']){ echo "ERREUR MEC, complète ce champs, sinon je ne vais pas être content :)";} ?>
    
