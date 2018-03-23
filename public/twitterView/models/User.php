<?php

namespace TwitterView\Models;


class User {

    public $id;
    public $handle;
    public $displayName;
    public $followers;
    public $friends;
    public $tweets;
    public $profileImg;
    public $bannerImg;

    function __construct($data) {
        $this->id = $data['id'];
        $this->handle = $data['handle'];
        $this->displayName = $data['displayName'];
        $this->followers = $data['followers'];
        $this->friends = $data['friends'];
        $this->tweets = $data['tweets'];
        $this->profileImg = $data['profileImg'];
        $this->bannerImg = $data['bannerImg'];

    }

    function __toString() {
        $string =
            '<div class="col-lg-3 col-md-4 col-xs-6 userCard">' .
                '<a href="#" class="d-block mb-4">' .
                    '<div class="card h-50">' .
                        '<a class="userLink" href="?controller=users&action=show&user=' . $this->id . '"></a>' .
                        '<img class="card-img-top h-50" src="'. $this->profileImg .'" alt="Card image cap">' .
                        '<div class="card-body">' .
                            '<h2 class="card-title tweet-title">' . $this->displayName . '</h2>' .
                            '<h4 class="tweet-subtitle"><a href="https://twitter.com/'. $this->handle .'" target="_blank">@' . $this->handle . '</a></h4>' .
                            '<p class="card-text">' . $this->text . '</p>' .
                        '</div>' .
                    '</div>' .
                '</a>' .
            '</div>';
        ;

        return $string;
    }

}

