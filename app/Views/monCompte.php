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

	<div class="top">
	<div class="row">

		<div class="grid_12">
			<!--start navigation-->
			<nav>
				<ul class="menu" > 
					<li >
						<a href="<?php echo $BASE; ?>/"><img src="public/images/menu/home2.png">Acceuil</a>			  
					</li>
					<li>
						<a href="#"><img src="public/images/menu/DeposerAnnonce2.png">Deposer une annonce</a> 
					</li>
					<li>
						<a href="offer"><img src="public/images/menu/Caddie2.png">Consulter</a>
					</li>							  
					<li class="selected">
						<a href="monCompte"><img src="public/images/menu/MonCompte2.png">Mon Compte</a>
				
					</li>
					<li>
						<a href="contact.html"><img src="public/images/menu/home2.png">Rechercher</a>
					</li>
					
						
				</ul>
					<div id="contactLink" class="boutonId">
						<span id="creerCompte" ><a>Créer un compte</a></span><br>
						<span ><a><img src="public/images/menu/seConnecter.png">Se connecter</a></span>
					</div>
					<div class="langue">
						<a href="#"><img src="public/images/menu/france.png" alt="langue française"></a>
						<a href="#"><img src="public/images/menu/uk.png" alt="English language"></a>
					</div>
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
					            	<p>Facebook connect</p>
					            	<p>Twitter connect</p>
					            	<p>gmail connect</p>
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
					<li><a href="monCompte#tabs-3">Mes avis</a></li>
					<li><a href="monCompte#tabs-4">Mes réservations</a></li>
					<li><a href="monCompte#tabs-5">Mes paiements</a></li>
					<li><a href="monCompte#tabs-6">Mes réclamations</a></li>
				</ul>
			</div>
			
			<div class="grid_8 nomargin part_info">
	<div id="tabs-1">

		<h2>Mon profil</h2>
		<form>
		<div class="box2">
			<div id="profil-pic">
			<label id="upload"><span>Photo de profil </span><br/><br/><img src="https://graph.facebook.com/" /><br/><br/><input id="normal" type="file"></input></label><br/>
			</div>

			<div id="info3">
				<label><span>Nom :</span><input type="text" value="" placeholder="Nom"></input></label>
				<label><span>Prénom :</span><input type="text" value="" placeholder="Prénom"></input></label>
				<label><span>Civilité :</span>Homme<input type="radio" value="Homme" name="civitilite"></input>Femme<input type="radio" value="Femme" name="civitilite"></input></label>
				<label><span>Email :</span><input type="text" value="" placeholder="Adresse e-mail"></input></label>
				<label><span>Dâte de naissance :</span></br><input type="date" value="" min="1920-08-14" max="2013-02-08" placeholder="Date de naissance"></input></label>
				<label><span>Adresse complete :</span><input class="base" type="text" value="" placeholder="Adresse"></input></label>
				<label><span>Mot de passe :</span><input type="password" value="" placeholder="Mot de passe"></input></label>
				<label><span>Confirmation mot de passe :</span><input type="password" value="" placeholder="Confirmer le mot de passe"></input></label>
			</div>
			<div id="BoutonAction">
				<label id="envoyer"><input type="submit" value="Envoyer" class="postuler"></input></label>
			</div>
		</div>
		</form>

	</div>


	<div id="tabs-2">
		<h2>Mes services effectués</h2>

		<div class="tab_part_right">
			<img src="public/images/list/achat_immediat.jpg">
			<div class="description2">
				<img src="public/images/dummies/img.png">
				<h3>Aide pour aller chercher mes courses</h3><br>
				<p>dzkozkodzkodzodzkodzkodzkodzokzdokdzokkodzkodzokdzdzokdzko</p>
			</div>
			<div class="info2">
				<ul>
					<li><img src="public/images/dummies/price.png"><p>5 euros</p></li>
					<li><img src="public/images/dummies/location.png"><p>Paris 12e</p></li>
					<li><img src="public/images/dummies/event.png"><p>23/02/2013</p></li>
				</ul>
			</div>
		</div>

		<div class="tab_part_right">
			<img src="public/images/list/achat_immediat.jpg">
			<div class="description2">
				<img src="public/images/dummies/img.png">
				<h3>Aide pour aller chercher mes courses</h3><br>
				<p>dzkozkodzkodzodzkodzkodzkodzokzdokdzokkodzkodzokdzdzokdzko</p>
			</div>
			<div class="info2">
				<ul>
					<li><img src="public/images/dummies/price.png"><p>5 euros</p></li>
					<li><img src="public/images/dummies/location.png"><p>Paris 12e</p></li>
					<li><img src="public/images/dummies/event.png"><p>23/02/2013</p></li>
				</ul>
			</div>
		</div>

	</div>


	<div id="tabs-3">
		<h2>Mes avis</h2>
		<div class="tab_part_right">
			<div class="description2">
				<img src="public/images/dummies/img.png">
				<h3>Super</h3>
				<p>Super moment avec léo, ponctuel et efficace, il a su déboucher mes toilettes en un clin d'oeil</p>
			</div>
			<div class="info2">
				<ul>
					<li><h5>Note:</h5><p>18/20</p></li>
				</ul>
			</div>
		</div>

		<div class="tab_part_right">
			<div class="description2">
				<img src="public/images/dummies/img.png">
				<h3>Bien</h3>
				<p>Merci à Arthur d'avoir porter mes courses, il aura fait il un bon esclave dans Django</p>
			</div>
			<div class="info2">
				<ul>
					<li><h5>Note:</h5><p>15/20</p></li>
				</ul>
			</div>
		</div>

		<div class="tab_part_right">
			<div class="description2">
				<img src="public/images/dummies/img.png">
				<h3>Mauvais</h3>
				<p>Simon ne m'a pas livré mon mac do à l'heure prévue...</p>
			</div>
			<div class="info2">
				<ul>
					<li><h5>Note:</h5><p>4/20</p></li>
				</ul>
			</div>
		</div>


	</div>
	<div id="tabs-4">
		<h2>Content heading 4</h2>
		<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora, lacus.</p>
		<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
	</div>
	<div id="tabs-5">
		<h2>Content heading 5</h2>
		<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad ltra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
	</div>
	<div id="tabs-6">
		<h2>Content heading 6</h2>
		<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
		<p>Duis cursus. Maecenas ligula .</p>
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
