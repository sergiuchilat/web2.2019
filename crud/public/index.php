<?php
error_reporting(E_ALL);
require '../vendor/autoload.php';
require_once '../app/core/APP.php';

session_start();
// unset($_SESSION['USER']);
//todo is31z refactor this
$_SESSION['USER']['name'] = $_SESSION['USER']['name'] ?: 'Guest';
APP::getInstance()->run();
