<?php
require_once 'vendor/autoload.php';

/**
 * Define the routes table...
 */
$routes = array(
    '/\/hello\/(.+)/' => array('HelloController', 'helloAction')
);

/**
 * Decide which route to run
 */
foreach ($routes as $url => $action) {

    $matches = preg_match($url, $_SERVER['REQUEST_URI'], $params);

    if ($matches > 0) {
        // Run this action
        $controller = new $action[0];
        $controller->{$action[1]}($params);

        break;
    }
}
