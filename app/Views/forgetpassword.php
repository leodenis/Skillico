 <form action="" method="post" enctype="multipart/form-data">
       <span class="error"></span>
        <input type="text" name="login" placeholder="login" value=""/>
      <input type="submit" value="save"/>
     </form>

     <?php if($errorMsg['login']){ echo "ERREUR MEC, complète ce champs, sinon je ne vais pas être content :)";} ?>