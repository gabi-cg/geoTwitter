<?php

  require_once('TwitterAPIExchange.php');

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
      $url = 'https://api.twitter.com/1.1/search/tweets.json';
      $getfield = '?q=&geocode=' . $lat . ',' . $lng . ',50km&count=100';
      $requestMethod = 'GET';
      $twitter = new TwitterAPIExchange($this->infoKeys);
      $result = $twitter->setGetfield($getfield)
              ->buildOauth($url, $requestMethod)
              ->performRequest();
      return json_decode($result,true);
    }

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
