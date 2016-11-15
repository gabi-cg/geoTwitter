// JavaScript Document
"use strict";

function setearFuncionalidadNav() {
  // botones de navegación
  $("#dirSearch").on("click", function() {
    cargarCiudad();
  });
  $("#reload").on("click", function() {
    location.reload();
  });


}

function countTweets(data) {
  $("#response").html(data);
  //alert("statuses: " + data);
}

function ajaxGET(link) {
  $.ajax({
      type:"GET",
      url: link,
      dataType: "HTML",
      success: function(data) {
        JSON.stringify(data);
        countTweets(data);
      },
      error: function(jqxml, status, errorThrown) {
        $("#response").html("No se pudo cargar la página");
        //console.log(errorThrown);
      }
    });
}

/*-------- get info Twitter del lugar dada longitud y latitud --------*/
function getInfoTweetsByLatLng(latitud, longitud) {
  ajaxGET("index.php?action=getInfoTwitter&lat=" + latitud + "&lng=" + longitud);
}
/*-------- FIN get info Twitter del lugar dada longitud y latitud --------*/

/*-------- set direccion y mostrar en mapa --------*/
function cargarCiudad() { /*http://jafrancov.com/2011/06/geocode-gmaps-api-v3/*/
  var address = $('#dir').val(); // obtenemos direccion
  var geocoder = new google.maps.Geocoder(); // objeto geocoder
  geocoder.geocode({ 'address': address}, geocodeResultados);
}

function geocodeResultados(results, status) {
  var dataBird;
  if (status == 'OK') {
    dataBird = getInfoTweetsByLatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
    var mapOptions = {
      center: results[0].geometry.location,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map($("#map_canvas").get(0), mapOptions);
    map.fitBounds(results[0].geometry.viewport); // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
    // Dibujamos un marcador con la ubicación del primer resultado obtenido
    var markerOptions = { position: results[0].geometry.location }
    var marker = new google.maps.Marker(markerOptions);
    marker.setMap(map);

    //aca tengo que llamar a la función del tweeter !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

  } else {
    alert("Geocoding error. " + status); // en vez de un mensaje puedo mostrar el error en div del mapa
  }
}
/*-------- FIN set direccion y mostrar en mapa --------*/

/*
function setMarker(map) {

}
*/

function initialize() {
  var latLng = new google.maps.LatLng(55.328611,87.136944);
  var mapOptions = {
    zoom: 8,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
}

function mapResponsive() {
  $("#map_canvas").css({"width":$(".map").width()+"px", "height":$(".map").height()+"px"});
}


$(document).ready(function() {
  setearFuncionalidadNav();
  mapResponsive();
  initialize();
});
