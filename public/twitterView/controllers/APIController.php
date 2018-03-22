<?php
namespace TwitterView\Controllers;
require_once("config.inc.php");

use TwitterView\Renderer as Renderer;
use TwitterView\Utils\TweetDecoder as TweetDecoder;

class APIController {


    private static function getSettings() {
        return array(
            'oauth_access_token'        => OAUTH_ACCESS_TOKEN,
            'oauth_access_token_secret' => OAUTH_ACCESS_TOKEN_SECRET,
            'consumer_key'              => CONSUMER_KEY,
            'consumer_secret'           => CONSUMER_SECRET
        );
    }

    public static function getHomeTweets() {
        $settings = self::getSettings();
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $language = 'en';
        $getfield = '?lang='.$language.'&count='."5".'&tweet_mode=extended&q='."test";
        $requestMethod = 'GET';
        $twitter = new \TwitterAPIExchange($settings);
        $result = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
        return TweetDecoder::decodeTweet(json_decode($result, true));
    }
}