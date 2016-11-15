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
      $getfield = '?q=&geocode=' . $lat . ',' . $lng . ',10km';
      $requestMethod = 'GET';
      $twitter = new TwitterAPIExchange($this->infoKeys);
      $twitter->setGetfield($getfield)
              ->buildOauth($url, $requestMethod)
              ->performRequest();
      return $twitter;
    }

    /*

    public function copyImage($image){
      $path = 'img/'.$image["name"];
      copy($image["tmp_name"], $path);
      return $path;
    }

    function addDance($name,$info,$image) {
          $path_image =  $this->copyImage($image);
          $insertDance = $this->db->prepare("INSERT INTO clase(nombre,informacion,imagen) VALUES(?,?,?)");
          $insertDance->execute(array($name,$info,$path_image));
          $this->$db->commit();

    }

    */

  }
?>
