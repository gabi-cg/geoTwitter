<?php

  require_once('TwitterAPIExchange.php'); // usamos esta clase para enviar los tokens de acceso a Twitter y poder hacer uso de su API

  class MapModel {

    private $infoKeys;

    function __construct() {
      ini_set('display_errors', true);

      /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
      $this->infoKeys = array (
        'oauth_access_token' => "797565196717977600-tqyC5c1FIcsC1w2y5YToNeI8bKX7HS9",
        'oauth_access_token_secret' => "okMPr3TIvhzSsSQw7LWwveTXE95kw1OMVUUXqlTZ18rTh",
        'consumer_key' => "MKmd7TQLqVoDo1s7fJv7iEjc5",
        'consumer_secret' => "Bl3Bn3DGVukspchzmN3pVrwWMThiEew8nhGJuwMRju34AJdEPB"
      );
    }

    function getInfoTwitter($lat, $lng) {
      $url = 'https://api.twitter.com/1.1/search/tweets.json'; // el recurso permite obtener como máx 100 resultados
      $getfield = '?q=&geocode=' . $lat . ',' . $lng . ',50km&count=100'; // establecemos un radio de 50 km a la redonda del lugar para obtener los tweets
      $requestMethod = 'GET';
      $twitter = new TwitterAPIExchange($this->infoKeys); // aquí se hace uso de la clase para realizar la autenticación
      $result = $twitter->setGetfield($getfield)
              ->buildOauth($url, $requestMethod)
              ->performRequest();
      return json_decode($result,true);
    }

    // se obtienen los hashtags dado el array "statuses" obtenido de la API de Twitter del recurso search/tweets
    function getHashtags($data) {
      $result = array();
      for($i=0; $i<count($data); $i++) {
        $aux = $data[$i]["entities"]["hashtags"];
        foreach ($aux as $hash) {
          if (!in_array($hash["text"],$result)) {
            $result[] = $hash["text"];
          }
        }
      }
      return $result;
    }

  }
?>
