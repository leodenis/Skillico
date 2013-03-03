window.onload=function() {
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
      scrollwheel:false,
      draggable: false,
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

    $('#position').submit(function(event){
    	event.preventDefault();
        $.ajax({
            type: "GET",
            url: '/offer/mapSearch/@search'
        }).done(function(data) {
        	console.log(data)
        });
    })
}
