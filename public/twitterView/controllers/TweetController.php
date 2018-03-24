<?php
namespace TwitterView\Controllers;
require_once("config.inc.php");

use TwitterView\Renderer as Renderer;

class TweetController {

    private $tweet;
    private $settings;

    public function show() {
        if (!isset($_GET['tweet'])) {
            $this->error();
            exit;
        }
        $tweet = $this->getTweetInfo($_GET['tweet']);
        $view = new Renderer('views/tweets/');
        $view->tweet = $tweet;
        $view->tweet->sticky = "stickyTweet";
        $view->replies = APIController::getReplies($tweet->id, $tweet->user->handle);
        $view->render('show.php');
    }
    public function search() {
        if (isset($_GET["query"])) {
            $tweets = APIController::getHashtags($_GET['query']);
        }
        $view = new Renderer('views/tweets/');
        $view->tweets = $tweets;

        $view->render('search.php');
    }
    public function error()
    {
        $view = new Renderer('views/main/');
        $view->render('error.php');
    }

    public function getTweetInfo($id) {
        return APIController::getSpecificTweet($id);
    }

    private function setSettings() {
        $this->settings = array(
            'oauth_access_token'        => OAUTH_ACCESS_TOKEN,
            'oauth_access_token_secret' => OAUTH_ACCESS_TOKEN_SECRET,
            'consumer_key'              => CONSUMER_KEY,
            'consumer_secret'           => CONSUMER_SECRET
        );
    }
}