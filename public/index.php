<?php
require '../helpers.php';

/**
 * Create the routes
 */


// inspectAndDie($uri); // For test!
// require basePath('router.php');

require basePath('Router.php');
$router = new Router();


$routes = require basePath('routes.php');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->resolve($uri, $method);
