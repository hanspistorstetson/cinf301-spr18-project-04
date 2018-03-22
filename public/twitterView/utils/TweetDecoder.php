<?php

namespace TwitterView\Utils;



class TweetDecoder {

    public static function decodeTweet($json) {
        $tweets = array();
        $tweet_num = 0;
        foreach ($json["statuses"] as $tweet) {
            $tweets[$tweet_num] = array(
                "created_at" => $tweet["created_at"],
                "full_text" => $tweet["full_text"],
                "user" => array(
                    "id" => $tweet['user'],
                    "handle" => $tweet['name'],
                    "displayName" => $tweet["screen_name"]
                )
            );
            $tweet_num += 1;
        }
        return $tweets;
        for ($i = 0; $i < count($tweets); $i++) {
            echo "Tweet #" . $i . "\n\t";
            echo "Created at: " . $tweets[$i]["created_at"] . "\n\t";
            echo "Full Text: " . $tweets[$i]["full_text"] . "\n\t";
            echo "\n\n";
        }

    }
}

