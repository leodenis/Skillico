$(function() {
	$( "#slider-range-max" ).slider({
		range: "max",
		min: 1,
		max: 150,
		value: 2,
		slide: function( event, ui ) {
			$( "#amount_diam" ).val( ui.value );
		}
	});
	$( "#amount_diam" ).val( $( "#slider-range-max" ).slider( "value" ) );


	/********** MAP SEARCH *******************/

	ajoutMarker = function(obj,i){
		
		var latlngAdd = new google.maps.LatLng(obj.lat,obj.lng)
		var marker = new google.maps.Marker({
		    draggable: false,
		    icon: "public/images/marker.png",
		    latLng: latlngAdd,
		    map: mapSearch
		});
	}

	var latlngCenter;
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(function(position){
			var lat = position.coords.latitude;
			var lng = position.coords.longitude;
			latlngCenter = new google.maps.LatLng(lat,lng);
	        mapSearch.setCenter(latlngCenter);
	  		marker.setPosition(latlngCenter);
		}, function(){
			if(localStorage.getItem(localStorage.key('mapMe'))!=null){
				var data = JSON.parse(localStorage.getItem(localStorage.key('mapMe')));
				latlngCenter = new google.maps.LatLng(data.lat,data.lng);
	            mapSearch.setCenter(latlngCenter);
	      		marker.setPosition(latlngCenter);
			}else{
				$.fancybox({
					'width'				: '100%',
					'height'			: '100%',
					'autoScale'			: false,
					'transitionIn'		: 'true',
					'transitionOut'		: 'true',
					'content'			: '<div class="info_box"><form id="addressDefine"><label>Veuillez renseigner votre position : </label><input type="text" id="addressToCenter"><input type="submit" value="Envoyer"></form></div>',
					'type'				: 'html'
				});
				$('#addressDefine').submit(function(event){
						event.preventDefault();
						var address = $('#addressToCenter').val();
						var geocoder = new google.maps.Geocoder();
		                geocoder.geocode({"address":address}, function(data,status){
		                    if(status=='OK'){
		                            var lat = data[0].geometry.location.lat();
		                            var lng = data[0].geometry.location.lng();
		                            latlngCenter = new google.maps.LatLng(lat,lng);
		                            mapSearch.setCenter(latlngCenter);
		                      		marker.setPosition(latlngCenter);
		                            $.fancybox.close();
									var localStorageMap = {
										lat:lat,
										lng:lng
									};
									var key='mapMe';
									localStorage.setItem(key,JSON.stringify(localStorageMap));
		                    }else{
		                    	$('#addressDefine').remove()
		                    	$('#info_box').html('<p>Nous n\'avons pas r&eacute;ussi &agrave; vous localiser. Veuillez nous excuser.</p>')
		                    	window.setInterval(function(){$.fancybox.close();},2000);
	                            var lat = 48.8496548;
	                            var lng = 2.39148799;
	                            latlngCenter = new google.maps.LatLng(lat,lng);
	                            mapSearch.setCenter(latlngCenter);
	                      		marker.setPosition(latlngCenter);
		                    }
		                });   
				})
			}
		}, {enableHighAccuracy:true})
	}
	else{
		if(localStorage.getItem(localStorage.key('mapMe'))!=null){
			var data = JSON.parse(localStorage.getItem(localStorage.key('mapMe')));
			latlngCenter = new google.maps.LatLng(data.lat,data.lng);
	        mapSearch.setCenter(latlngCenter);
	  		marker.setPosition(latlngCenter);
		}else{
			$.fancybox({
				'width'				: '60%',
				'height'			: '100%',
				'autoScale'			: false,
				'transitionIn'		: 'true',
				'transitionOut'		: 'true',
				'content'			: '<div class="info_box"><form id="addressDefine"><label>Veuillez renseigner votre position : </label><input type="text" id="addressToCenter"><input type="submit" value="Envoyer"></form></div>',
				'type'				: 'html'
			});
			$('#addressDefine').submit(function(event){
					event.preventDefault();
					var address = $('#addressToCenter').val();
					var geocoder = new google.maps.Geocoder();
	                geocoder.geocode({"address":address}, function(data,status){
	                	console.log(data);
	                    if(status=='OK'){
	                        var lat = data[0].geometry.location.lat();
	                        var lng = data[0].geometry.location.lng();
	                        latlngCenter = new google.maps.LatLng(lat,lng);
	                        mapSearch.setCenter(latlngCenter);
	                  		marker.setPosition(latlngCenter);
	                        $.fancybox.close();
							var localStorageMap = {
								lat:lat,
								lng:lng
							};
							var key='mapMe';
							localStorage.setItem(key,JSON.stringify(localStorageMap));
	                    }else{
	                    	$('#info_box form').remove()
	                    	$('#info_box').html('<p>Nous n\'avons pas r&eacute;ussi &agrave; vous localiser. Veuillez nous excuser.</p>')
	                    	window.setInterval(function(){$.fancybox.close();},2000);
	                        var lat = 48.8496548;
	                        var lng = 2.39148799;
	                        latlngCenter = new google.maps.LatLng(lat,lng);
	                    }
	                });   
			})
		}
	}

	var geocoder = new google.maps.Geocoder();

	var mapOptions = {
	  zoom: 12,
	  mapTypeControl: false,
	  streetViewControl: false,
	  zoomControl: false,
	  // scrollwheel:false,
	  // draggable: false,
	  zoomControl:false,
	  scaleControl: false,
	  center: latlngCenter,
	  mapTypeId: google.maps.MapTypeId.ROADMAP 
	};

	var mapSearch = new google.maps.Map(document.getElementById("mapSearch"), mapOptions);
	    
	var marker = new google.maps.Marker({
	    draggable: false,
	    icon: "public/images/marker.png",
	    map: mapSearch
	});

	$.getJSON('./offer/searchHome')
	.success(function(datas){
		console.log(datas);
	});



});




		 var price = "";
		  $(function() {
		    $( "#slider-range" ).slider({
		      range: true,
		      min: 0,
		      max: 500,
		      values: [ 75, 300 ],
		      slide: function( event, ui ) {
		       $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		       var contenu = $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		       price = contenu[0].value;

					var elem = price.split('-');
					var souselem1 = elem[0];
					var souselem2 = elem[1];
					//supprime le premier caractère
					var elem1 = souselem1.substring(1,souselem1.length);
					var elem2 = souselem2.substring(2,souselem2.length);

		       ajaxSearch(elem1,elem2);
		      }
		    });



		    	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		      " - $" + $( "#slider-range" ).slider( "values", 1 ) );

		  });


				function ajaxSearch(elem1,elem2) {
					
					//Récupération des données
					var searchBarre = $('#search2').val();
					var search1 = $('#search').val();
					var searchin = $('input[type=radio][name=searchin]:checked').attr('value');
					//Récupération des checkbox

					var search2 = $('input[type=checkbox][name=chk1]:checked').attr('value');
					var search3 = $('input[type=checkbox][name=chk2]:checked').attr('value');
					var search4 = $('input[type=checkbox][name=chk3]:checked').attr('value');
					var search5 = $('input[type=checkbox][name=chk4]:checked').attr('value');

					if (elem1 == undefined) {
						elem1= '0';
					}
					if (elem2 == undefined) {
						elem2= '1000';
					};

					var text = '-';
					var sepCat = '&&';
					var dynamique = '';

					if (search2 == undefined) {
						dynamique='';
					}
					else{
						 dynamique= dynamique+text+search2;
					}
					if (search3 == undefined) {
						dynamique = dynamique + '';
					}
					else{
						dynamique = dynamique+text+search3;
					}
					if (search4 == undefined) {
						dynamique = dynamique + '';
					}
					else{
						dynamique = dynamique+text+search4;
					}
					if (search5 == undefined) {
						dynamique = dynamique + '';
					}
					else{
						dynamique = dynamique+text+search5;
					}


			

					//Ajout de - pour ensuite pouvoir séparer les données

					//concaténation des variables
					var espaceSearch = text+searchin+text+elem1+text+elem2+dynamique;

					//Supprime les espaces dans la chaine de caractère
					var a = '';
					for (i=0;i<espaceSearch.length;i++)
					{
					if (espaceSearch.charAt(i)!=' '){a+=espaceSearch.charAt(i);}
					}
					espaceSearch = a;

					search = search1+text+searchBarre+espaceSearch;
					console.log(search);
					

					$.ajax({
						// Envoi de la requête en ajax
						type: "GET",
						url: "./offer/search/"+search,
						dataType : "html",
					
						error:function(msg, string){
							alert( "Error !: " + string );
						},
					
						success:function(data){
	 						$("#donneesAnnonces").html('');

	                        if (data) {
	                            var obj = jQuery.parseJSON(data);

	                            for (var i = 0; i < obj.length; i++) {
	                            	if(obj[i].type == 'immediat'){
	                            		enchImm='<img src="public/images/list/achat_immediat.jpg">';
	                            	}
	                            	else{
	                            		enchImm='<img src="public/images/list/enchere.jpg">';
	                            	}
	                            	ajoutMarker(obj[i], i);
									$("#donneesAnnonces").append('<div class="grid_8 nomargin part_right">'+enchImm+'<div class="description"><img src="public/images/dummies/img.png"><h3>'+obj[i].title+'</h3></br><p>'+obj[i].description+'</p></div><div class="info"><ul><li><img src="public/images/dummies/price.png"><p>' + obj[i].price + '</p></li><li><img src="public/images/dummies/location.png"><p>Paris 12e</p></li><li><img src="public/images/dummies/event.png"><p>'+obj[i].ending+'</p></li></ul><a href="offer/detailsOffer/'+obj[i].id_offer+'"><input type="button" value="Postuler" class="postuler"></a></div></div>');
		                        }
		                    };        	                             
		                }
		            });

					return false;
				}


var ajoutMarker;