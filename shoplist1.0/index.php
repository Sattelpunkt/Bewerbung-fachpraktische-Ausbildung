<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Europe/Berlin');
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('PROOT', getcwd());
require_once 'geddon/geddon.php';

$app = new geddon();
$app->dispatch();
