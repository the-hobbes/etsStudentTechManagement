<?php

//Display errors
error_reporting(32767);
ini_set('display_errors', '1');

//Define base url. I.E localhost/ETS
define("BASE_URL", $_SERVER['HTTP_HOST'].'/'.basename(__DIR__).'/');

require 'libs/web_application.php';

//The main application
$app = new web_application();


?>
