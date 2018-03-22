<?php

namespace TwitterView\Models;
require_once("config.inc.php");

use TwitterAPI as TwitterAPI;
use TwitterView\Utils\TweetDecoder;


class HomeTweets {

    public static function getHomeTweets() {
        $settings = array(
            'oauth_access_token'        => OAUTH_ACCESS_TOKEN,
            'oauth_access_token_secret' => OAUTH_ACCESS_TOKEN_SECRET,
            'consumer_key'              => CONSUMER_KEY,
            'consumer_secret'           => CONSUMER_SECRET
        );
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        /* Define the language. */
        $language = 'en';
        /* Create the paramter fields. */
        $getfield = '?lang='.$language.'&count='."5".'&tweet_mode=extended&q='."test";
        /* Define the request method. */
        $requestMethod = 'GET';
        /* Create a new TwitterAPIExchange object. */
        $twitter = new \TwitterAPIExchange($settings);
        /* Retrieve the data from the Twitter API. */
        $result = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
        /* Json decode the data. */
        return json_decode($result, true)["statuses"];
        //return TweetDecoder::decodeTweet(json_decode($result, true));
    }
}

