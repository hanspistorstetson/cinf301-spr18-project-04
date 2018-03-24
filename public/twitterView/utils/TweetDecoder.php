<?php

namespace TwitterView\Utils;

use TwitterView\Models\Tweet as Tweet;
use TwitterView\Models\Reply as Reply;

class TweetDecoder {

    public static function decodeTweets($json) {
        $tweets = array();
        $tweet_num = 0;
        foreach ($json as $tweet) {

            if (isset($tweet['retweeted_status'])) {
                $text = $tweet['retweeted_status']['full_text'];
            } else {
                $text = $tweet['full_text'];
            }

            $tweets[$tweet_num] = array(
                "createdAt" => $tweet["created_at"],
                "fullText" => $text,
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
            $_SESSION['tweetid' . $tweetId] = serialize($tweetObj);
            array_push($tweetObjs,  $tweetObj);
        }
        return $tweetObjs;
    }

    public static function decodeTweetReplies($json) {
        $tweets = array();
        $tweet_num = 0;
        foreach ($json as $tweet) {
            if (isset($tweet['retweeted_status'])) {
                $text = $tweet['retweeted_status']['full_text'];
            } else {
                $text = $tweet['full_text'];
            }

            $tweets[$tweet_num] = array(
                    "createdAt" => $tweet["created_at"],
                    "fullText" => $text,
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
            $tweetObj = new Reply($tweet);
            $tweetId = $tweetObj->id;
            $_SESSION['id' . $tweetId] = serialize($tweetObj);
            array_push($tweetObjs,  $tweetObj);
        }
        return $tweetObjs;
    }




    public static function decodeTweet($json) {
        if (isset($json['retweeted_status']['full_text'])) {
            $text = $json['retweeted_status']['full_text'];
        } else {
            $text = $json['full_text'];
        }

        $tweet = array(
            "fullText" => $text,
            "createdAt" => $json["created_at"],
            "id" => $json["id_str"],
            "likes" => $json["favorite_count"],
            "retweets" => $json["retweet_count"],
            "user" => array(
                "id" => $json['user']['id'],
            "handle" => $json['user']['screen_name'],
            "displayName" => $json['user']["name"]
            )
        );

        $tweetObj = new Tweet($tweet);
        $tweetId = $tweetObj->id;
        $_SESSION['id' . $tweetId] = serialize($tweetObj);
        return $tweetObj;
    }

    public static function decodeTweetText($json) {
        $tweets = array();
        $tweet_num = 0;
        foreach ($json as $tweet) {

            if (isset($tweet['retweeted_status'])) {
                $text = $tweet['retweeted_status']['text'];
            } else {
                $text = $tweet['text'];
            }

            $tweets[$tweet_num] = array(
                "createdAt" => $tweet["created_at"],
                "fullText" => $text,
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
            $_SESSION['tweetid' . $tweetId] = serialize($tweetObj);
            array_push($tweetObjs,  $tweetObj);
        }
        return $tweetObjs;
    }
}

