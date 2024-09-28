<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();

$log = new Logger('app');
$log->pushHandler(new StreamHandler('app.log', Logger::WARNING));

/**
 * Helper functions
 */

function dump($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function warn($data) {
    global $log;
    $log->warning($data);
}

function err($data) {
    global $log;
    $log->error($data);
}
