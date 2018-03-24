<?php
namespace TwitterView\Controllers;

use TwitterView\Renderer as Renderer;

class HashtagController {

    public function home() {
        if (isset($_GET["query"])) {
            $tweets = APIController::getHashtags($_GET['query']);
        }
        $view = new Renderer('views/hashtags/');
        $view->tweets = $tweets;

        $view->render('home.php');
    }
    public function error()
    {
        $view = new Renderer('views/main/');
        $view->render('error.php');
    }

}