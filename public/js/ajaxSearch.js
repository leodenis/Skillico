window.onload = function(){

	/****************************************************************************************************************************
	*																															*
	*									MAP RESEARCH !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!					*
	*																															*
	*****************************************************************************************************************************/



	/*****************************Definition de la map***************************************/

	var mapOptions = {
	  zoom: 12,
	  mapTypeControl: false,
	  streetViewControl: false,
	  zoomControl: false,
	  scrollwheel:false,
	  // draggable: false,
	  zoomControl:false,
	  scaleControl: false,
	  center: latlngCenter,
	  mapTypeId: google.maps.MapTypeId.ROADMAP 
	};
	var mapSearch = new google.maps.Map(document.getElementById("mapSearch"), mapOptions);
	var markerMe = new google.maps.Marker({
	    draggable: false,
	    icon: "public/images/mon_marker.png",
	    map: mapSearch
	});

	/*******************************Localisation*******************************************/

	var latlngCenter;
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(function(position){
			var lat = position.coords.latitude;
			var lng = position.coords.longitude;
			latlngCenter = new google.maps.LatLng(lat,lng);
	        mapSearch.setCenter(latlngCenter);
	  		markerMe.setPosition(latlngCenter);
		}, function(){
			if(localStorage.getItem(localStorage.key('mapMe'))!=null){
				var data = JSON.parse(localStorage.getItem(localStorage.key('mapMe')));
				latlngCenter = new google.maps.LatLng(data.lat,data.lng);
	            mapSearch.setCenter(latlngCenter);
	      		markerMe.setPosition(latlngCenter);
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
		                      		markerMe.setPosition(latlngCenter);
		                            $.fancybox.close();
									var localStorageMap = {
										lat:lat,
										lng:lng
									};
									var key='mapMe';
									localStorage.setItem(key,JSON.stringify(localStorageMap));
		                    }else{
		                    	$('#addressDefine').remove();
		                    	$('#info_box').html('<p>Nous n\'avons pas r&eacute;ussi &agrave; vous localiser. Veuillez nous excuser.</p>');
		                    	window.setInterval(function(){$.fancybox.close();},2000);
	                            var lat = 48.8496548;
	                            var lng = 2.39148799;
	                            latlngCenter = new google.maps.LatLng(lat,lng);
	                            mapSearch.setCenter(latlngCenter);
	                      		markerMe.setPosition(latlngCenter);
		                    }
		                });   
				})
			}
		}, {enableHighAccuracy:true});
	}
	else{
		if(localStorage.getItem(localStorage.key('mapMe'))!=null){
			var data = JSON.parse(localStorage.getItem(localStorage.key('mapMe')));
			latlngCenter = new google.maps.LatLng(data.lat,data.lng);
	        mapSearch.setCenter(latlngCenter);
	  		markerMe.setPosition(latlngCenter);
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
	                  		markerMe.setPosition(latlngCenter);
	                        $.fancybox.close();
							var localStorageMap = {
								lat:lat,
								lng:lng
							};
							var key='mapMe';
							localStorage.setItem(key,JSON.stringify(localStorageMap));
	                    }else{
	                    	$('#info_box form').remove();
	                    	$('#info_box').html('<p>Nous n\'avons pas r&eacute;ussi &agrave; vous localiser. Veuillez nous excuser.</p>');
	                    	window.setInterval(function(){$.fancybox.close();},2000);
	                        var lat = 48.8496548;
	                        var lng = 2.39148799;
	                        latlngCenter = new google.maps.LatLng(lat,lng);
	                    }
	                });   
			})
		}
	}


	/****************************************************************************************************************************
	*																															*
	*														AJAX RESEARCH														*
	*																															*
	*****************************************************************************************************************************/
	
	/******************* DATA SLIDER ******************************/

	var search = {};
	search.priceRange = {};
	search.cat = {};
	var marker = {};

	$( "#slider-range-max" ).slider({
		range: "max",
		min: 1,
		max: 150,
		value: 50,
		slide: function( event, ui ) {
			$( "#amount_diam" ).val( ui.value );
		}
	});
	if (search.priceRange[0] == undefined && search.priceRange[1] == undefined) {
		search.priceRange[0]=75;
		search.priceRange[1]=300;
	}
	$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 500,
		values: [ 75, 300 ],
		slide: function( event, ui ) {
			$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			search.priceRange[0] = ui.values[0];
			search.priceRange[1] = ui.values[1];
			console.log(search);
		}
	})
	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

	var reqURL = document.URL;
	document.getElementById('position').onsubmit = function(event){
		event.preventDefault();
		return false;
	}
	document.getElementById('search2').onkeyup = function(){reqData()};
	document.getElementById('search').onkeyup = function(){reqData()};
	document.getElementById('slider-range').onmouseup = function(){reqData()};
	document.getElementById('slider-range-max').onmouseup = function(){reqData()};
	$('input').change(function(){reqData()});

	// if(localStorage.getItem(localStorage.key('searchLast'))!=null){
	// 	var datareqLoc = JSON.parse(localStorage.getItem(localStorage.key(1)));
	// 	reqData(datareqLoc);
	// }else{
		reqData();
	// }

	function reqData(){
		// if(datareqLoc!=null){
		// 	search = datareqLoc;
		// }else{
			console.log(reqURL)
			//Récupération des données
			if(reqURL == null){
				search.searchBarre = document.getElementById('search2').value;
				reqURL = null;
			}else{
				search.searchBarre = reqURL.substring((reqURL.search('=')+1),reqURL.length);
				document.getElementById('search2').value = reqURL.substring((reqURL.search('=')+1),reqURL.length);
				reqURL = null;
			}
			search.location = $('#search').value;
			search.type = $('input[type="radio"][name="searchin"]:checked')[0].value;
			search.order = $('input[type="radio"][name="order"]:checked')[0] != null ? $('input[type=radio][name=order]:checked')[0].value : null;
			//Récupération des checkbox
			for(i=0;i<$('#cat_offer input:checked').length;i++){
				search.cat[i] = $('#cat_offer input:checked')[i].value;
			}	
		// }
		$.ajax({
			type: "POST",
			url: "./offer/search",
			data: search,
			error:function(msg, string){
				alert( "Error !: " + string );
			},
			success:function(data){
				$("#donneesAnnonces").html('');
				if (data) {
					// if(data[1] > 1){
					// 	if(data[2] == null){
					// 		$('.objpage').val(jQuery.param(search));
					// 		$("#next_form").attr('action','offer-2');
					// 		$('#previous_form').css('display','none');
					// 	}
					// 	else if(data[2]==data[1]){
					// 		$('.objpage').val(jQuery.param(search));
					// 		$("#next_form").css('display','none');
					// 		$('#previous_form').attr('action','offer-'+(data[1]-1));
					// 	}
					// 	else{
					// 		$('.objpage').val(jQuery.param(search));
					// 		$("#next_form").attr('action','offer-'+(data[1]+1));
					// 		$('#previous_form').attr('action','offer-'+(data[1]-1));
					// 	}
					// }
					for(var j in marker){
						marker[j].setMap(null);
					}        	    
					var obj = data[0];
					for(var i=0; i<obj.length; i++){
						obj[i].beginning = obj[i].beginning.substring(0,10)
						marker[i] = new google.maps.Marker({
							position: new google.maps.LatLng(obj[i].lat,obj[i].lng),
						    draggable: false,
						    icon: "public/images/marker.png",
						    map: mapSearch
						});
						marker[i].info = new google.maps.InfoWindow({
							content: '<div style="width:350px;"><img style="float:left;" src="public/images/list/'+ obj[i].type +'.jpg"><div style="float:left;"><h3>'+obj[i].title+'</h3><p>'+obj[i].description+'</p></div><div style="float:right;"><ul><li><img style="float:left;" src="public/images/dummies/price.png"><p>' + obj[i].price + '</p></li><li><img style="float:left;" src="public/images/dummies/location.png"><p>Paris 12e</p></li><li style="height:30px"><img style="float:left;" src="public/images/dummies/event.png"><p>'+obj[i].beginning+'</p></li></ul><a href="offer/detailsOffer/'+obj[i].id_offer+'"><input type="button" value="Postuler" class="postuler"></a></div></div>'
						});
						(function(i){
							google.maps.event.addListener(marker[i], 'click', function() {
								marker[i].info.open(mapSearch, marker[i]);
							});
						}(i));
						var key='searchLast';
						localStorage.setItem(key,JSON.stringify(search));
						$("#donneesAnnonces").append('<div class="grid_8 nomargin part_right"><img src="public/images/list/'+ obj[i].type +'.jpg"><div class="description"><img src="public/images/dummies/img.png"><h3>'+obj[i].title+'</h3></br><p>'+obj[i].description+'</p></div><div class="info"><ul><li><img src="public/images/dummies/price.png"><p>' + obj[i].price + '</p></li><li><img src="public/images/dummies/location.png"><p>Paris 12e</p></li><li><img src="public/images/dummies/event.png"><p>'+obj[i].beginning+'</p></li></ul><a href="offer/detailsOffer/'+obj[i].id_offer+'"><input type="button" value="Postuler" class="postuler"></a></div></div>');				
					}
				};          
            }
        });
	}
}