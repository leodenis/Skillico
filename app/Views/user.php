      <form action="" method="post" enctype="multipart/form-data">
       <span class="error"></span>
        <input type="text" name="login" placeholder="login" value=""/>
        <input type="text" name="email" placeholder="email" value=""/>
        <input type="text" name="password" placeholder="password" value=""/>
        <input type="text" name="password2" placehorlder="Veuillez confirmer votre mot de passe" value=""/> 
        <input type="text" name="name" placeholder="name" value=""/>
        <input type="text" name="firstname" placeholder="firstname" value=""/>
        <input type="text" name="adress" placeholder="adress" value=""/>
        <input type="text" name="phone" placeholder="phone" value=""/>
         <input type="text" name="date_creation" placeholder="date_creation" value=""/>
        <input type="text" name="last_connection" placeholder="last_connection" value=""/>
        <input type="text" name="level" placeholder="level" value=""/>
        <input type="hidden" name="fk_id_image" value="2" value=""/>

        <input type="submit" value="save"/>
     </form>

     <?php if($errorMsg['login']){ echo "ERREUR MEC, complète ce champs, sinon je ne vais pas être content :)";} ?>