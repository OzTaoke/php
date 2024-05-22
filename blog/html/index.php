<?php

use Base\Application;
use Base\RouteException;

include '../vendor/autoload.php';
include '../src/config.php';

// Launching the application
$app = new Application();
try {
    $app->run();
} catch (RouteException $e) {
    echo $e->getMessage();
}
