<?php

namespace TwitterView\Utils;

use TwitterView\Models\Tweet as Tweet;

class TweetDecoder {

    public static function decodeTweet($json) {
        $tweets = array();
        $tweet_num = 0;
        foreach ($json["statuses"] as $tweet) {
            $tweets[$tweet_num] = array(
                "createdAt" => $tweet["created_at"],
                "fullText" => $tweet["full_text"],
                "id" => $tweet["id_str"],
                "likes" => $tweet["favorite_count"],
                "retweets" => $tweet["retweet_count"],
                "user" => array(
                    "id" => $tweet['user']['id'],
                    "handle" => $tweet['user']['screen_name'],
                    "displayName" => $tweet['user']["name"]
                )
            );
            $tweet_num += 1;
        }
        $tweetObjs = [];
        foreach ($tweets as $tweet) {
            $tweetObj = new Tweet($tweet);
            $tweetId = $tweetObj->id;
            $_SESSION['id' . $tweetId] = serialize($tweetObj);
            array_push($tweetObjs,  $tweetObj);
        }
        return $tweetObjs;
    }
}

