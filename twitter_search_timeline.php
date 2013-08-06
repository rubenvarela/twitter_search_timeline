<?

$LIBRARY_PATH = "twitter-api-php-master/TwitterAPIExchange.php";
$TWITTER_USERNAME = 'fortalezapr';
$TEXT_TO_FIND = '#envivo';

function get_tweet() {
  require_once( 'twitter-api-php-master/TwitterAPIExchange.php' );

  $settings = array(
    'oauth_access_token' => "24695635-bxsWVQc2gRPSs1hbSoSUvVo1rMz94jCdDuB0rJMuw",
    'oauth_access_token_secret' => "AIRLt1lSircRl8E0ylLatHtLN0u6AkZ0WsfjzoDRtQ",
    'consumer_key' => "I8Tj5c0WselYcA1pAQRzfg",
    'consumer_secret' => "pcaoknLiJC1YQxsrJEEFL3MQTVCxj8Za4a4xUQSTQzY"
  );

  $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
  $getfield = '?screen_name=' . $TWITTER_USERNAME;
  $requestMethod = 'GET';

  $twitter = new TwitterAPIExchange($settings);

  $output = $twitter->setGetfield($getfield)
                    ->buildOauth($url, $requestMethod)
                    ->performRequest();

  $tweets_decoded = json_decode ( $output, TRUE );

  foreach ( $tweets_decoded as $t ) {
    if( stripos ( $t['text'], $TEXT_TO_FIND ) ){
      return $t['text'];
    }
  }

}