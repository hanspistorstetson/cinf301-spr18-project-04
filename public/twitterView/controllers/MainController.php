<?php

namespace TwitterView\Controllers;

use TwitterView\Renderer as Renderer;
use TwitterView\Models\HomeTweets;

class MainController {
    public function home()
    {
        $tweets = HomeTweets::getHomeTweets();
        $title = 'Sorting Extravaganza!';
        $view = new Renderer('views/main/');
        $view->tweets = $tweets;
        $view->title = $title;
        $view->render('home.php');
    }
    public function error()
    {
        $view = new Renderer('views/main/');
        $view->render('error.php');
    }
}