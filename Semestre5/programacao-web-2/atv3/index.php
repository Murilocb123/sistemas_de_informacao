<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('log_app.log', Level::Warning));

// add records to the log
$log->warning('Warning while processing request');
$log->error('rror while processing request');