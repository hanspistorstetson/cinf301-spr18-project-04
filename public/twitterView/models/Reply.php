<?php

namespace TwitterView\Models;


class Reply extends Tweet {
    function __toString() {
        $string =
            '<div class="row">' .
                '<div class="col-sm-1"></div>' .
                '<div class="col-sm-11">' .
                    '<div class="card replies">' .
                        '<a class="tweetLink" href="?controller=tweets&action=show&tweet=' . $this->id . '"></a>' .
                        '<div class="card-body">' .
                            '<h2 class="card-title tweet-title">' . $this->user->displayName . '</h2>' .
                            '<h4 class="tweet-subtitle"><a href="https://twitter.com/'. $this->user->handle .'" target="_blank">@' . $this->user->handle . '</a></h4>' .
                            '<p class="card-text">' . $this->text . '</p>' .
                            '<span class="tweetmeta"><i class="fas fa-retweet"></i> ' . $this->retweets . '</span>' .
                            '<span class="tweetmeta"><i class="fas fa-star"></i> ' . $this->likes . '</span>' .
                        '</div>' .
                    '</div>' .
                "</div>" .
            '</div>'
        ;
        return $string;
    }
}

