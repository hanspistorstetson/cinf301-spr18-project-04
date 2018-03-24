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

    public function show() {
        if (!isset($_GET['user'])) {
            $this->error();
            exit;
        }
        unset($_SESSION['userid' . $_GET['user']]);
        if (!isset($_SESSION["userid" . $_GET['user']])) {
            $user = $this->getUserInfo($_GET['user']);
        } else {
            $user = unserialize($_SESSION["userid" . $_GET['user']]);
        }
        $tweets = APIController::getUserTweets($user->id);
        $view = new Renderer('views/users/');
        $view->tweets = $tweets;
        $view->user = $user;

        $view->render("show.php");
    }
    public function error()
    {
        $view = new Renderer('views/main/');
        $view->render('error.php');
    }


    private function getUserInfo($userid) {
        return APIController::getSpecificUser($userid);
    }
}