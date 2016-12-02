// JavaScript Document
"use strict";
var results = [];
var res = "";

function setearFuncionalidadNav() {
  // botones de navegación
  $("#dirSearch").on("click", function() {
    cargarCiudad();
  });
  $("#reload").on("click", function() {
    location.reload();
  });
}

function ajaxGET(link, map, lat, lng) {
  $.ajax({
      type:"GET",
      url: link,
      dataType: "HTML",
      success: function(data) {
        $("#response").html(data);
        cargarMarcador(map, lat, lng);
      },
      error: function(jqxml, status, errorThrown) {
        $("#response").html("No se pudo cargar la página.");
        console.log(errorThrown);
      }
    });
}

/*-------- get info Twitter del lugar dada longitud y latitud --------*/
function getInfoTweetsByLatLng(map, latitud, longitud) {
  ajaxGET("index.php?action=getInfoTwitter&lat=" + latitud + "&lng=" + longitud, map, latitud, longitud);
}
/*-------- FIN get info Twitter del lugar dada longitud y latitud --------*/

/*-------- set direccion y mostrar en mapa --------*/
function cargarCiudad() { // http://jafrancov.com/2011/06/geocode-gmaps-api-v3/
  var address = $('#dir').val(); // obtenemos direccion
  var geocoder = new google.maps.Geocoder(); // objeto geocoder
  geocoder.geocode({ 'address': address}, geocodeResultados);
}

// función que setea el marcador en el lugar seleccionado (icono de twitter)
function cargarMarcador(map, lat, lng) {
  var pos = new google.maps.LatLng(lat, lng);
  var marker = new google.maps.Marker({
    position: pos,
    map: map,
    title:"Esto es un tweet", // acá puedo poner la cantidad de tweets obtenidos
    icon: "img/markerHalf.png",
    animation: google.maps.Animation.DROP
  });

  $("#response").show();
  var infowindow = new google.maps.InfoWindow({
    content: $("#response").html()
  });
  $("#response").hide();

  // al hacer cick que me brinde los trending topics
  marker.addListener('click', function() {
    infowindow.open(map, marker)
  });
}

function geocodeResultados(results, status) {
  if (status == 'OK') {
    var mapOptions = {
      center: results[0].geometry.location,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map($("#map_canvas").get(0), mapOptions);

    getInfoTweetsByLatLng(map, results[0].geometry.location.lat(), results[0].geometry.location.lng()); // tengo que devolver la cantidad de tweets

    map.fitBounds(results[0].geometry.viewport); // fitBounds acercará el mapa con el zoom adecuado de acuerdo al lugar buscado

  } else {
    alert("Geocoding error. " + status); // en vez de un mensaje puedo mostrar el error en div del mapa
  }
}
/*-------- FIN set direccion y mostrar en mapa --------*/

function initialize() {
  var latLng = new google.maps.LatLng(55.328611,87.136944);
  var mapOptions = {
    zoom: 10,
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
