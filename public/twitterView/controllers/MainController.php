<?php

namespace TwitterView\Controllers;

use TwitterView\Renderer as Renderer;
use TwitterView\Controllers\APIController;

class MainController {
    public function home()
    {
        $tweets = APIController::getHomeTweets();

        $view = new Renderer('views/main/');
        $view->tweets = $tweets;
        $view->render('home.php');
    }
    public function error()
    {
        $view = new Renderer('views/main/');
        $view->render('error.php');
    }
}