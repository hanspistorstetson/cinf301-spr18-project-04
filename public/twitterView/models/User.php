<?php

namespace TwitterView\Models;


class User {

    public $id;
    public $handle;
    public $displayName;

    function __construct($data) {
        $this->id = $data['id'];
        $this->handle = $data['handle'];
        $this->displayName = $data['displayName'];
    }

    public static function getHomeTweets() {

    }
}

