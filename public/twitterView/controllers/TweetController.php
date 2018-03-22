<?php
namespace TwitterView\Controllers;
require_once("config.inc.php");

use TwitterView\Renderer as Renderer;
use TwitterView\Utils\TweetDecoder as TweetDecoder;

class TweetController {

    private $tweet;
    private $settings;

    public function show() {
        if (!isset($_GET['id'])) {
            $this->error();
            exit;
        }
        if (!isset($_SESSION[$_GET['id']])) {
            $this->tweet = $this->getTweetInfo();
        } else {
            $this->tweet = $_SESSION[$_GET['id']];
        }
        $view = new Renderer('views/tweets/');
        $view->render('home.php');
    }
    public function error()
    {
        $view = new Renderer('views/main/');
        $view->render('error.php');
    }

    public function getTweetInfo() {

    }

    private function setSettings() {
        $this->settings = array(
            'oauth_access_token'        => OAUTH_ACCESS_TOKEN,
            'oauth_access_token_secret' => OAUTH_ACCESS_TOKEN_SECRET,
            'consumer_key'              => CONSUMER_KEY,
            'consumer_secret'           => CONSUMER_SECRET
        );
    }

    public function getHomeTweets() {
        $this->setSettings();
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        /* Define the language. */
        $language = 'en';
        /* Create the paramter fields. */
        $getfield = '?lang='.$language.'&count='."5".'&tweet_mode=extended&q='."test";
        /* Define the request method. */
        $requestMethod = 'GET';
        /* Create a new TwitterAPIExchange object. */
        $twitter = new \TwitterAPIExchange($this->settings);
        /* Retrieve the data from the Twitter API. */
        $result = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
        /* Json decode the data. */
        //return json_decode($result, true)["statuses"];
        return TweetDecoder::decodeTweet(json_decode($result, true));
    }
}