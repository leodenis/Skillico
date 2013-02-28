    window.onload=function() {

    var geocoder = new google.maps.Geocoder();

    var mapOptions = {
      zoom: 12,
      mapTypeControl: false,
      streetViewControl: false,
      zoomControl:false,
      scaleControl: false,
      //center: LatLng,
      mapTypeId: google.maps.MapTypeId.ROADMAP 
    };

    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        
    var marker = new google.maps.Marker({
        draggable: true,
        icon: "public/images/mon_marker.png",
        map: map
    });

    var decimals = 8;   // arrondi des coordonnées

    /*
     * Geocoding
     */
    (document.getElementById("localiser").onclick=function(e){

        geocoder.geocode({"address":document.getElementById("address").value}, function(data, status){

            if (status == google.maps.GeocoderStatus.OK) {

                document.getElementById("address").value=data[0].formatted_address;
                refreshMap(data[0].geometry.location);

                // Prépare la liste des suggestions
                if (data.length > 1) {
                    var list=document.getElementById("list");
                    while (list.hasChildNodes()) {
                        list.removeChild(list.firstChild);
                    }
                    for (var i=0; i<data.length; i++) {
                        var a = document.createElement("a");
                        a.setAttribute("href", "");
                        a.setAttribute("title", data[i].formatted_address);
                        a.onclick=function(event){
                            event.preventDefault();
                            document.getElementById("address").value=this.getAttribute("title");
                            document.getElementById("localiser").onclick(false);
                        }
                        a.appendChild(document.createTextNode(data[i].formatted_address));

                        var li = document.createElement("li");
                        li.appendChild(a);
                        list.appendChild(li);
                    }
                    document.getElementById("suggest").style.display="block";
                } else if (e !== false) {   // passer FALSE au lieu d'un Event n'efface pas les suggestions
                    document.getElementById("suggest").style.display="none";
                }

            } else {
                //alert("Votre adresse semble pété");
                document.getElementById('erreur_map').innerHTML = "La géolocalisation est impossible, votre adresse semble incorrecte<br/>" ;
            }
        });
        return false;
    })();


    /*
     * Drag & drop du marqueur
     */
    google.maps.event.addListener(marker,"dragend",function(e){
        refreshMap(e.latLng);
        geocoder.geocode({"latLng": e.latLng}, function(data, status) {
            if (status == google.maps.GeocoderStatus.OK && data[0]) {
                document.getElementById("suggest").style.display="none";
                document.getElementById("addr").value=data=data[0].formatted_address;
            }
        });
    });

    /*
     * Actualise l'affichage
     */
    function refreshMap(point) {
        var b=Math.pow(10,decimals);
        //document.getElementById("lat").value=Math.round(point.lat()*b)/b;
        //document.getElementById("lng").value=Math.round(point.lng()*b)/b;
        map.setCenter(point);
        marker.setPosition(point);
        marker.setTitle(point.lat()+";"+point.lng());
    }
}
