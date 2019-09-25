<?php
error_reporting(E_ALL);
require __DIR__ . '/vendor/autoload.php';
require_once 'core/APP.php';
APP::getInstance()->run();
