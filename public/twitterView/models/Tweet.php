<?php

namespace TwitterView\Models;

use TwitterView\Models\User as User;

class Tweet {

    public $text;
    public $id;
    public $user;
    public $likes;
    public $retweets;
    public $createdAt;
    public $sticky;

    function __construct($data) {
        $this->user = new User($data['user']);
        $this->text = $this->replaceUserWithHyperlink($data['fullText']);
        $this->id = $data['id'];
        $this->likes = $data['likes'];
        $this->retweets = $data["retweets"];
        $this->createdAt = $data["createdAt"];
        $_SESSION[$this->id] = serialize($this);
    }

    function replaceUserWithHyperlink($text) {
        $replaced_text = preg_replace("(@\w+)", '<a href="https://twitter.com/' . $this->user->handle . '" target="_blank">@' . $this->user->handle . '</a>', $text);
        return $replaced_text;
    }

    function __toString() {
        $sticky = isset($this->sticky) ? $this->sticky : "";
        $string =
            '<div class="card tweet ' . $sticky . '">' .
                '<a class="tweetLink" href="?controller=tweets&action=show&tweet=' . $this->id . '"></a>' .
                '<div class="card-body">' .
                    '<h2 class="card-title tweet-title">' . $this->user->displayName . '</h2>' .
                    '<h4 class="tweet-subtitle"><a href="https://twitter.com/'. $this->user->handle .'" target="_blank">@' . $this->user->handle . '</a></h4>' .
                    '<p class="card-text">' . $this->text . '</p>' .
                    '<span class="tweetmeta"><i class="fas fa-retweet"></i> ' . $this->retweets . '</span>' .
                    '<span class="tweetmeta"><i class="fas fa-star"></i> ' . $this->likes . '</span>' .
                    '<a href="#" class="link"><span class="tweetmeta"><i class="fas fa-link"></i> ' . $this->likes . '</span></a>' .
        '</div>' .
            '</div>'
        ;
        return $string;
    }

}