<?php

namespace TwitterView\Controllers;

use TwitterView\Renderer as Renderer;
use TwitterView\Models\HomeTweets;

class UserController {
    public function home()
    {
        if (isset($_GET["query"])) {
            $users = APIController::getUsers($_GET['query']);
        }
        $view = new Renderer('views/users/');
        $view->users = $users;
        $view->render('home.php');
    }
    public function error()
    {
        $view = new Renderer('views/main/');
        $view->render('error.php');
    }
}