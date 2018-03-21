<?php

namespace TwitterView\Controllers;

use TwitterView\Renderer as Renderer;

class MainController {
    public function home()
    {

        $title = 'Sorting Extravaganza!';

        $view = new Renderer('views/main/');
        $view->title = $title;
        $view->render('home.php');
    }
    public function error()
    {
        $view = new Renderer('views/main/');
        $view->render('error.php');
    }
}