<?php
namespace TwitterView\Controllers;
require_once("config.inc.php");

use TwitterView\Renderer as Renderer;
use TwitterView\Utils\TweetDecoder as TweetDecoder;
use TwitterView\Utils\UserDecoder as UserDecoder;

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
        $getfield = '?lang='.$language.'&count='."5".'&tweet_mode=extended&q=a';
        $requestMethod = 'GET';
        $twitter = new \TwitterAPIExchange($settings);
        $result = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
        return TweetDecoder::decodeTweets(json_decode($result, true)['statuses']);
    }

    public static function getSpecificTweet($id) {
        $settings = self::getSettings();
        $url = 'https://api.twitter.com/1.1/statuses/show.json';
        $getField = '?id='.$id . '&tweet_mode=extended';
        $requestMethod = 'GET';
        $twitter = new \TwitterAPIExchange($settings);
        $result = $twitter->setGetfield($getField)->buildOauth($url, $requestMethod)->performRequest();
        return TweetDecoder::decodeTweet(json_decode($result, true));
    }

    public static function getReplies($id, $userHandle) {
        $lang = 'en';
        $settings = self::getSettings();
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getField = '?q=to:' . $userHandle . '&since_id=' . $id . '&lang=' . $lang;
        $requestMethod = 'GET';
        $twitter = new \TwitterAPIExchange($settings);
        $result = $twitter->setGetfield($getField)->buildOauth($url, $requestMethod)->performRequest();
        return TweetDecoder::decodeTweetReplies(json_decode($result, true)['statuses']);

    }

    public static function getUsers($query) {
        $settings = self::getSettings();
        $url = "https://api.twitter.com/1.1/users/search.json";
        $getField = "?q=" . $query . "&count=20";
        $requestMethod = "GET";
        $twitter = new \TwitterAPIExchange($settings);
        $result = $twitter->setGetfield($getField)->buildOauth($url, $requestMethod)->performRequest();
        return UserDecoder::decodeUsers(json_decode($result, true));
    }

    public static function getSpecificUser($id) {
        $settings = self::getSettings();
        $url = "https://api.twitter.com/1.1/users/show.json";
        $getField = "?user_id=" . $id;
        $requestMethod = "GET";
        $twitter = new \TwitterAPIExchange($settings);
        $result = $twitter->setGetfield($getField)->buildOauth($url, $requestMethod)->performRequest();
        return UserDecoder::decodeUser(json_decode($result, true));
    }

    public static function getHashtags($query) {
        $settings = self::getSettings();
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $language = 'en';
        $getfield = '?lang='.$language.'&count='."5".'&tweet_mode=extended&q=' . $query;
        $requestMethod = 'GET';
        $twitter = new \TwitterAPIExchange($settings);
        $result = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
        return TweetDecoder::decodeTweets(json_decode($result, true)['statuses']);
    }

    public static function getUserTweets($userid) {
        $settings = self::getSettings();
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?user_id=' . $userid . '&count=20&include_rts=true&tweet_mode=extended';
        $requestMethod = 'GET';
        $twitter = new \TwitterAPIExchange($settings);
        $result = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
        return TweetDecoder::decodeTweets(json_decode($result, true));
    }



}