<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();
require __DIR__ . '/../src/dbconfig.php';
//require_once 'include/DbHandler.php';
// Instantiate the app
//echo "hello";die();
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);
//$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';



// Run app
$app->run();
