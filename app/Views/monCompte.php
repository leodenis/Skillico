<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Skillico - Le site communeautaire d'aide</title>
	<meta name="description" content="Skillico vous permet d'aider des gens ou de vous faire aider contre une rémunération.">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
        <base href="<?php echo $BASE; ?>/" />
	
	<!-- CSS -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700italic,700' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="public/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />	
	<link rel="stylesheet" href="public/css/base.css">
	<link rel="stylesheet" href="public/css/amazium.css">
	
	<link rel="stylesheet" href="public/css/style.css">
	<link rel="stylesheet" href="public/css/layout.css">
	
	<!-- Favicons -->
	<link rel="shortcut icon" href="public/images/favicon_skillico.ico" />
	<link rel="apple-touch-icon-precomposed" href="public/images/apple-touch-icon.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="public/images/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="public/images/apple-touch-icon-114x114.png" />
	
	<script src="public/js/jquery.min.js" type="text/javascript"></script>
	<script src="public/js/raphael-min.js" type="text/javascript"></script>
	<script src="public/js/jquery.easing.1.3.js" type="text/javascript"></script>
	
 <!-- slideshow -->
	<script src="public/js/iview/iview.js"></script>
	<script src="public/js/iview/function.js"></script>
	
	
	<script type="text/javascript" src="public/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="public/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
 	<script src="public/js/fancybox/function.js"></script>
	
	<script src="public/js/tooltips.js"></script>	
	
	<script src="public/js/twitter/jquery.tweet.js"></script>	
	<script src="public/js/twitter/function.js"></script>	

	<script src="public/js/functions.js"></script>	



	<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

	<link rel="stylesheet" href="public/css/contactForm.css" />
    <script src="public/js/jquery-1.2.6.min.js" type="text/javascript"></script>
    <script src="public/js/contactForm.js" type="text/javascript"></script>

	<script src="public/js/AjaxRequete.js"></script>



	<script>
	$(function() {
		$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
		$( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
	});
	</script>
	
	<script>
	/* SCRIPT QUI PERMET D'OUVRIR LA LIGHTBOX */

		$(document).ready(function() {
			$("#deposer_annonce").fancybox({
				'width'				: '60%',
				'height'			: '100%',
				'autoScale'			: false,
				'transitionIn'		: 'true',
				'transitionOut'		: 'true',
				'type'				: 'iframe'
			});
	
		});		
	</script>
	
</head>
<body>

<header>
	<div class="topstatic">
	<div class="row">
				<div class="grid_4">
					<div class="logo">
						<a href="index.html"><img src="public/images/logo.png" alt="" /></a>
					</div>	
				</div>
				<div class="grid_8">
					<!--start navigation-->
					<div class="call_contact">
						<span><a href="https://twitter.com/share" class="twitter-share-button" data-url="https://twitter.com/Skillicohetic" data-via="Skillicohetic" data-lang="en">Tweet</a></span>
						<span class="fb-like" data-href="http://www.facebook.com/skillico" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></span></br>
					</div>
						

					<!--end navigation-->	
				</div>

	</div>
	</div>

	<div class="top gun">
	<div class="row">

		<div class="grid_12">
			<!--start navigation-->
			<nav>
				<ul class="menu" > 
					<li>
						<a href="<?php echo $BASE; ?>/"><img src="public/images/menu/home2.png">Acceuil</a>			  
					</li>
					<li>
						<a id="deposer_annonce" href="deposerUneAnnonce"><img src="public/images/menu/DeposerAnnonce2.png">Deposer une annonce</a> 
					</li>
					<li>
						<a href="offer"><img src="public/images/menu/Caddie2.png">Consulter</a>
					</li>
					<?php 
						if(F3::get('SESSION.user')){
						 	echo '<li class="selected"><a href="monCompte"><img src="public/images/menu/MonCompte2.png">Mon Compte</a></li>';
						}
					?>							  
						
				</ul>
					<?php 
						if(F3::get('SESSION.user')){
							echo '<div id="logg"><a href="monCompte" alt="mon_compte"><img src="public/images/' .$infoUserCo[0]['imageUser'].'" id="pic_header" /><p id="userConnect">Bienvenue ' .F3::get('SESSION.user[0][login]').'</p></a>';	
							echo '<a href="user/deconnexion"><p id="userDeco">Déconnexion</p></a></div>';
						}
						else{
					?>
						<div id="contactLink" class="boutonId">
							<span id="creerCompte" ><a>Créer un compte</a></span><br>
							<span ><a><img src="public/images/menu/seConnecter.png">Se connecter</a></span>
						</div>
						<div class="langue">
							<a href="#"><img src="public/images/menu/france.png" alt="langue française"></a>
							<a href="#"><img src="public/images/menu/uk.png" alt="English language"></a>
						</div>
					<?php
						}
					?>		

			</nav>
			<!--end navigation-->	
		</div>

		<div class="grid_12 centered margintop15">
			<div class="grid_5 nomargin" id="connexion">
				<div class="box">
				    <div id="contactFormContainer">
				        <div id="contactForm">
				            <fieldset>
				            	<div id="part_connect">
				            		<h4>Se Connecter</h4>
					                <label for="identifiant">Identifiant*</label>
					                <input id="identifiant" type="text" />
					                <label for="mdp">Mot de passe*</label>
					                <input id="mdp" type="text" />
					                <input id="sendRequest" type="submit" name="submit" onclick="closeForm()" />
					            </div>
					            <div id="part_identify">
					            	<h4>Inscriver vous gratuitement</h4></br>
					            	<a href="formulaire_inscription"><p>S'inscrire</p></a>
					            	<a><p>Facebook connect</p></a>
					            	<a><p>Twitter connect</p></a>
					            </div>
				            </fieldset>
				        </div>
				    </div>            
				</div>
			</div>
		</div>
	
	</div>
	</div>

</header>

<section id="moncompte">

	<div class="row features">
		<div class="grid_12 centered margintop15"><div id="tabs">
			<div class="grid_3 nomargin" id="part_left">

				<ul class="menuCompte" style="background-color:white;">
					<li>Mon Compte</li>
					<li><a href="monCompte#tabs-1">Mon profil</a></li>
					<li><a href="monCompte#tabs-2">Mes services effectués</a></li>
					<li><a href="monCompte#tabs-4">Mes annonces postées</a></li>
					<li><a href="monCompte#tabs-3">Mes avis</a></li>
					<li><a href="monCompte#tabs-5">Mes paiements</a></li>
					<li><a href="monCompte#tabs-6">Réclamations</a></li>
				</ul>
			</div>
			
			<div class="grid_8 nomargin part_info">
	<div id="tabs-1">

		<h2>Mon profil</h2>
		<form action="user/edit" method="post" enctype="multipart/form-data">
		<div class="box2">
			<div id="profil-pic">
			<label id="upload"><span>Photo de profil</span><br/><br/><img style="width:150px;heigth:150px;" src="public/images/<?php echo $infoUserCo[0]['imageUser'];?>"/><br/><br/><input id="normal" type="file" name="image[]"></input></label><br/>
			</div>       																						 
			<div id="info3">
					<label><span>Nom :</span><input type="text" name="firstname" value="<?php echo $infoUserCo[0]['firstname']; ?>" placeholder="Nom"></input></label>
					<label><span>Prénom :</span><input type="text" name="name" value="<?php echo $infoUserCo[0]['name']; ?>" placeholder="Prénom"></input></label>
					<label><span>Civilité :</span></br>Homme<input type="radio" value="Homme" name="sexe" <?php if($infoUserCo[0]['sexe'] == 'Homme'){ echo 'checked';} ?>></input>Femme<input type="radio" value="Femme" name="sexe" <?php if($infoUserCo[0]['sexe'] == 'Femme'){ echo 'checked';} ?>></input></label>
					<label><span>Email :</span><input type="text" name="email" value="<?php echo $infoUserCo[0]['email']; ?>" placeholder="Adresse e-mail"></input></label>
					<label><span>Dâte de naissance :</span></br><input type="date" value="22/25/1991" min="1920-08-14" max="2013-02-08" name="born" placeholder="Date de naissance"></input></label>
					<label><span>Adresse</span><input class="base" name="adress" type="text" value="<?php echo $infoUserCo[0]['adress']; ?>" placeholder="Adresse"></input></label>
					<label><span>Code postal</span><input class="base" name="CP" type="text" value="<?php echo $infoUserCo[0]['CP']; ?>" placeholder="Adresse"></input></label>
					<label><span>Ville</span><input class="base" type="text" name="city" value="<?php echo $infoUserCo[0]['city']; ?>" placeholder="Adresse"></input></label>
					<label><span>Mot de passe :</span><input type="password" value="" placeholder="Mot de passe" name="password"></input></label>
					<label><span>Confirmation mot de passe :</span><input type="password" value="" placeholder="Confirmer le mot de passe" name="password2"></input></label>
					</div>
					<div id="BoutonAction">
						<label id="envoyer"><input type="submit" value="Envoyer" class="postuler"></input></label>
					</div>

		</div>
		</form>

	</div>


	<div id="tabs-2">
		<h2>Mes services effectués</h2>
		<?php foreach($getOfferRespondByUSerId as $getOfferRespondByUSerId):?>
		     <div class="tab_part_right">
				<img src="public/images/list/achat_immediat.jpg">
				<div class="description2">
					<img src="public/images/dummies/img.png">
					<h3><?php echo $getOfferRespondByUSerId['title']; ?></h3><br>
					<p><?php echo $getOfferRespondByUSerId['description']; ?></p>
				</div>
				<div class="info2">
					<ul>
						<li><img src="public/images/dummies/price.png"><p><?php echo $getOfferRespondByUSerId['price']; ?></p></li>
						<li><img src="public/images/dummies/location.png"><p>Paris 12e</p></li>
						<li><img src="public/images/dummies/event.png"><p><?php echo $getOfferRespondByUSerId['ending']; ?></p></li>
					</ul>
				</div>
			</div>
        <?php endforeach; ?>
	</div>

	<div id="tabs-4">
		<h2>Mes annonces postées</h2>
		<?php foreach($getOfferByUSerId as $getOfferByUSerId):?>
	        <div class="tab_part_right">
				<img src="public/images/list/achat_immediat.jpg">
				<div class="description2">
					<img src="public/images/dummies/img.png">
					<h3><?php echo $getOfferByUSerId['title']; ?></h3><br>
					<p><?php echo $getOfferByUSerId['desciption']; ?></p>
					<?php 
						if ($getOfferByUSerId['visibility'] == 1) {
					?>
						<a href="offer/validate/<?php echo $getOfferByUSerId['id_offer'];?>"><input type="button" value="Valider" class="postuler"></a>
					<?php
						}
					 ?>

					 <?php 
						if ($getOfferByUSerId['visibility'] == 2) {
					?><a href="offer/validate/<?php echo $getOfferByUSerId['id_offer'];?>">
						<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
							<input name="amount" type="hidden" value="<?php echo $getOfferByUSerId['price']; ?>" />
							<input name="currency_code" type="hidden" value="EUR" />
							<input name="shipping" type="hidden" value="0.00" />
							<input name="tax" type="hidden" value="0.00" />
							<input name="return" type="hidden" value="http://denis-leo.com/SkillicoMdp/app/Helpers/Library/success.php" />
							<input name="cancel_return" type="hidden" value="http://denis-leo.com/SkillicoMdp/app/Helpers/Library/cancel.php" />
							<input name="notify_url" type="hidden" value="http://denis-leo.com/SkillicoMdp/offer/paypal" />
							<input name="cmd" type="hidden" value="_xclick" />
							<input name="business" type="hidden" value="vendeu_1362172271_biz@gmail.com" />
							<input name="item_name" type="hidden" value="<?php echo $getOfferByUSerId['title']; ?>" />
							<input name="no_note" type="hidden" value="1" />
							<input name="lc" type="hidden" value="FR" />
							<input name="bn" type="hidden" value="PP-BuyNowBF" />
							<input name="custom" type="hidden" value="offer_id=<?php echo $getOfferByUSerId['id_offer']; ?>" />
							<input type="submit" value="Payer" class="postuler">
							<input name="custom" type="hidden" value="user_id=1" />
							<input type="submit" value="Payer" class="postuler"/>
						</form>
						<p>Vous avez validé votre annonce, vous pouvez dès à présent payer la personne</p>

					<?php
						}
					 ?>
				</div>
				<div class="info2">
					<ul>
						<li><img src="public/images/dummies/price.png"><p><?php echo $getOfferByUSerId['price']; ?></p></li>
						<li><img src="public/images/dummies/location.png"><p>Paris 12e</p></li>
						<li><img src="public/images/dummies/event.png"><p><?php echo $getOfferByUSerId['ending']; ?></p></li>
					</ul>
				</div>
			</div>  
				<div class="tab_part_right" id="noteOuverte">
					<label>Commentaire sur la prestation :<input type="text" placeholder="Votre commentaire"/></label>
					<label>Note sur 20 :<input type="text" placeholder="Votre note entre 0 et 20"/></label>
					<input type="submit" value="Valider" class="postuler"/> 
				</div>
        <?php endforeach; ?>


	</div>
	<div id="tabs-3">
		<h2>Mes avis</h2>
		<?php foreach($avisUser as $avisUser):?>
		<div class="grid_4 nomargin part_info left">
			<h2>Reçu</h2>
			<div class="tab_part_right">
				<div class="avis">
					<img src="public/images/dummies/img.png">
<!-- 					<h3>Super</h3>
 -->					<p><?php echo $avisUser['description']; ?></p>
				</div>
				<div class="info2">
					<ul>
						<li><h5>Note:</h5><p><?php echo $avisUser['note']; ?></p></li>
					</ul>
				</div>
			</div>
		</div>	
		<?php endforeach; ?>
	</div>



	<div id="tabs-5">
		<h2>Mes paiements</h2>
		<ul id="paiement">
			<li><label><span>Le 24/03/13 :</span> 15 Euros</label></li>
			<li><label><span>Le 25/03/13 :</span> 12 Euros</label></li>
			<li><label><span>Le 25/03/13 :</span> 14 Euros</label></li>
			<li><label><span>Le 26/03/13 :</span> 6 Euros</label></li>
			<li><label><span>Le 27/03/13 :</span> 8 Euros</label></li>
			<li><label><span>Le 28/03/13 :</span> 12 Euros</label></li>
			<li><label><span>Le 29/03/13 :</span> 11 Euros</label></li>
		</ul>
	</div>
	<div id="tabs-6">
			<h2>Réclamations</h2>
		<form action="user/edit" method="post" enctype="multipart/form-data">
		<div class="box2">
			<div id="info3">
					<label><span>E-mail :</span> skillico@contact.fr</label>
					<label><span>Téléphone :</span> 01 37 60 50 20</label>
					<label><span>Adresse :</span> 7 rue de la paix</label>
					<label><span>Ville :</span> Paris</label>
					<label><span>Code postal:</span> 75002</label>
					<label><span>Facebook :</span><a href="http://www.facebook.com/skillico?ref=hl"> Skillico</a></label>
					<label><span>Twitter :</span><a href="https://twitter.com/Skillicohetic"> #Skillico</a></label>
			</div>
		</div>

		</form>
		<div class="contact-form-holder">
				<h2>Formulaire de contact</h2>
				<form method="POST" id="contact-form" name="contact-form" action="offer/reclamation">
					<select name="subject">
						<?php foreach($RespondAndPosted as $RespondAndPosted):?>
							<option><?php echo $RespondAndPosted['title'].' - '.$RespondAndPosted['price']; ?></option>
					    <?php endforeach; ?>
					</select>
					<input name="user" type="hidden" value="<?php echo $infoUserCo[0]['login']; ?>" />
					<input name="email" type="hidden" value="<?php echo $infoUserCo[0]['email']; ?>" />
					<textarea name="message" id="message" cols="30" rows="10" placeholder="Taper votre message..."></textarea>
					<input type="submit" id="postuler" name="send-btn" value="Envoyer" />
				</form>
		    </div>
	</div>
				
            </div>
        </div>
	</div>
</div>
</section>



<footer>
	<div class="row">
	
		<div class="grid_3">
			<h4>Suivez-nous</h4>
			<p>Nous sommes disponible sur les différents réseaux sociaux
				Rejoignez-nous !</p>
				<!-- Social network -->
			<ul class="social_small">
				<li class="facebook first"><a href="#" data-rel="tooltip" title="Facebook">Facebook</a></li>
				<li class="twitter"><a href="#" data-rel="tooltip" title="Twitter">Twitter</a></li>
				<li class="vimeo"><a href="#" data-rel="tooltip" title="Vimeo">Vimeo</a></li>
				<li class="skype"><a href="#" data-rel="tooltip" title="Skype">Skype</a></li>
				<li class="dribble"><a href="#" data-rel="tooltip" title="Dribble">Dribble</a></li>
			</ul>	
		</div>
		
		<div class="grid_3">
			<h4>Le site</h4>
			<ul class="arrow-dot">
				<li><a href="#">Accueil</a></li>
				<li><a href="#">Déposer une annonce</a></li>
				<li><a href="#">Qui sommes-nous ?</a></li>
				<li><a href="#">Mon compte</a></li>
				<li><a href="#">Réclamations</a></li>
			</ul>
		</div>
		<div class="grid_3">
			<h4>En général</h4>
			<p>Skillico est un site qui vous permet d’être rémunérer contre vos services. 
Vous aimez bricoler et aider ? Postulez aux annonces et soyez rémunéré</p>
		</div>
		<div class="grid_3">
			<img src="public/images/logo.png" alt="" class="logo" />
			<p>Notre site web est désormais accessible sur mobile. Téléchargez l’application !
			</p>			
		</div>
	</div>
	<br/>
	<div style="width:1200px; margin:0 auto;"><p style="float:right;"><a href="">Skillico</a> - La rémunération de service de demain</p></div>
	
	

</footer>
<a href="#" class="scrollup">Scroll</a>
<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
		 	if (d.getElementById(id)) return;
		  	js = d.createElement(s); js.id = id;
	  		js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
	  		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>
</html>
