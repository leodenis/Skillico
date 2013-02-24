<!doctype html>
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

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />


	<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

	<link rel="stylesheet" href="public/css/contactForm.css" />
    <script src="public/js/jquery-1.2.6.min.js" type="text/javascript"></script>
    <script src="public/js/contactForm.js" type="text/javascript"></script>

	<script src="public/js/AjaxRequete.js"></script>	

	<script type="text/javascript">

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

	<div class="top">
	<div class="row">

		<div class="grid_12">
			<!--start navigation-->
						<nav>
				<ul class="menu" > 
					<li>
						<a href="<?php echo $BASE; ?>/"><img src="public/images/menu/home2.png">Acceuil</a>			  
					</li>
					<li>
						<a id="deposer_annonce" href="App/Views/deposer.html"><img src="public/images/menu/DeposerAnnonce2.png">Deposer une annonce</a> 
					</li>
					<li class="selected">
						<a href="offer"><img src="public/images/menu/Caddie2.png">Consulter</a>
					</li>
					<?php 
						if(F3::get('SESSION.user')){
						 	echo '<li><a href="monCompte"><img src="public/images/menu/MonCompte2.png">Mon Compte</a></li>';
						}
					?>							  
		
					<li>
						<a href="contact.html"><img src="public/images/menu/home2.png">Rechercher</a>
					</li>
					
						
				</ul>
					<?php 
						if(F3::get('SESSION.user')){
							echo '<p id="userConnect">Bienvenue ' .F3::get('SESSION.user[0][login]').'</p>';	
							echo '<p id="userDeco"><a href="user/deconnexion">Déconnexion</a></p>';
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
				            		<form action="user/connexion" method="post" enctype="multipart/form-data">
						                <label for="identifiant">Identifiant*</label>
						                <input id="identifiant" type="text" name="login" placeholder="login" value="" />
						                <label for="mdp">Mot de passe*</label>
						                <input id="mdp" type="password" name="password" placeholder="password" value=""/>
						                <input type="submit" value="save"/>
<!-- 						                <input id="sendRequest" type="submit" name="submit" value="save" onclick="closeForm()" />
 -->						        </form>

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
<aside id="featured" class="nopaddingbot marginbottom0">
	<img src="public/images/slide/map.jpg" style="margin:0px;" alt="Milieu urbain illustrant le concept de Skillico">
		<form id="position" class="form-wrapper">
			<input type="text" id="search2" placeholder="Rechercher une offre ..." onKeyUp="ajaxSearch();">
			<input type="submit" value="Rechercher" id="submit">
		</form>
</aside>
<section id="tri">
	<div class="row features">
		<div class="grid_12 centered margintop15">
			<div class="grid_3 nomargin">
				
			</div>
			<div class="grid_8 nomargin" id="tri_top">
				<span class="tri_bot"><p>Trier par :</p>
						<input type="checkbox" name="distance" value="distance">Distance
						<input type="checkbox" name="remuneration" value="remuneration">Rémunération
						<input type="checkbox" name="duree" value="duree">Durée
				</span>

			</div>
</section>
<section id="annonces">

	<div class="row features">
		<div class="grid_12 centered margintop15">
			<div class="grid_3 nomargin" id="part_left">
				<ul class="menuOffre" style="background-color:white;">
					<li>Filtrer les annonces</li>
					<li><p>Localisation</p><input type="text" id="search" name="search" onKeyUp="ajaxSearch();"/></li>
					<li><p for="amount_diam">Diamètre d'action</p><input style="width:90%;" type="text" id="amount_diam" value=""/></li>
					<div id="slider-range-max"></div>

					<li><p for="amout">Rémunération</p><input type="text" id="amount" style="border: 0; color: #f6931f; font-weight: bold;" value=""/>
										
					<div id="slider-range"></div>
					</li>		
					<li><p>Type de vente</p></li>
					<div><input style="font-size:1.2em;" type="radio" name="searchin" value="immediat" checked onClick="ajaxSearch();"/>Achat immédiat</br>
						<input style="font-size:1.2em;" type="radio" name="searchin" value="enchere" onClick="ajaxSearch();"/>Enchère
					</div>
					<li><p>Type d'annonce</p></li>
					<div>
						<input type="checkbox" name="chk1" value="course" onClick="ajaxSearch();"/>Service à la personne<br>
						<input type="checkbox" name="chk2" value="macdo" onClick="ajaxSearch();"/>Plomberie<br>
						<input type="checkbox" name="chk3" value="jardin" onClick="ajaxSearch();"/>Menuiserie<br>
						<input type="checkbox" name="chk4" value="alcool" onClick="ajaxSearch();"/>Alimentaire<br>
					</div>

				</ul>
			</div>


			<div id="donneesAnnonces">
				<?php foreach($offers as $offer):?>
                <?php echo $offer ?>
				<div class="grid_8 nomargin part_right">
					<img src="public/images/list/achat_immediat.jpg">
					<div class="description">
						<img src="public/images/dummies/img.png">
						<h3><?php echo $offer->title ?></h3><br>
						<p><?php echo $offer->desciption ?></p>
					</div>
					<div class="info">
						<ul>
							<li><img src="public/images/dummies/price.png"><p><?php echo $offer->price ?></p></li>
							<li><img src="public/images/dummies/location.png"><p>Paris 12e</p></li>
							<li><img src="public/images/dummies/event.png"><p><?php echo $offer->beginning = date("d/m/y") ?></p></li>
						</ul>
						<a href="offer/detailsOffer/<?php echo $offer->id_offer; ?>"><input type="button" value="Postuler" class="postuler"></a>
					</div>
				</div>
                <?php endforeach; ?>
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
