<?php

/**
 * Method to route the user to the appropriate controller/action.
 */
function route($controller, $action)
{
    switch($controller) {
        case 'main':
            $controller = new TwitterView\Controllers\MainController();
            break;
        case 'users':
            $controller = new TwitterView\Controllers\UserController();
        default:
            break;
    }
    $controller->{ $action }();
}

// K: controller, V: action
$controllers = array(
    'main'  => ['home', 'error'],
    'users' => ['home', 'error']
);
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        route($controller, $action);
    } else {
        route('main', 'error');
    }
} else {
    route('main', 'error');
}
