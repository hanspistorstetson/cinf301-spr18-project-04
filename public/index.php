<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();
    session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();


if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'main';
    $action = 'home';
}

require_once ('views/layout.php');