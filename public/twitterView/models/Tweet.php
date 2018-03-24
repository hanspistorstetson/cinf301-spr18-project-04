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
        $this->text = $this->replaceHashWithHyperLink($this->text);
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

    function replaceHashWithHyperLink($text) {
        $replaced = preg_replace("/(#\w+)/", '<a href="?controller=tweets&action=search&query=%23$1">' . '$1</a>', $text);
        $replaced = preg_replace("/q=#/", 'q=%23', $replaced);
        return $replaced;
    }

    // https://twitter.com/search?q=%23lit

}