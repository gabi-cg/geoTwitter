<?php
  ini_set('display_errors', true);
  require_once('TwitterAPIExchange.php');

  /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
  $settings = array (
    'oauth_access_token' => "797565196717977600-tqyC5c1FIcsC1w2y5YToNeI8bKX7HS9",
    'oauth_access_token_secret' => "okMPr3TIvhzSsSQw7LWwveTXE95kw1OMVUUXqlTZ18rTh",
    'consumer_key' => "MKmd7TQLqVoDo1s7fJv7iEjc5",
    'consumer_secret' => "Bl3Bn3DGVukspchzmN3pVrwWMThiEew8nhGJuwMRju34AJdEPB"
  );


  $url = 'https://api.twitter.com/1.1/search/tweets.json';
  $getfield = '?q=&geocode=' . $_POST["lat"] . ',' . $_POST['lng'] . ',' . $_POST['rad'] . 'km';
  $requestMethod = 'GET';
  $twitter = new TwitterAPIExchange($settings);
  /*echo $twitter->setGetfield($getfield)
               ->buildOauth($url, $requestMethod)
               ->performRequest();
  */
  return $twitter->setGetfield($getfield)
               ->buildOauth($url, $requestMethod)
               ->performRequest();

/*
  $url = 'https://api.twitter.com/1.1/users/show.json';
  $getfield = '?screen_name=gabic_g';
  $requestMethod = 'GET';
  $twitter = new TwitterAPIExchange($settings);
  echo $twitter->setGetfield($getfield)
               ->buildOauth($url, $requestMethod)
               ->performRequest();
*/
?>
