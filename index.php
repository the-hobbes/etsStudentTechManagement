<?php

//Display errors
error_reporting(32767);
ini_set('display_errors', '1');


//Define base url. I.E localhost/ETS
$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url = explode(basename(__DIR__), $url);
$url = $url[0].basename(__DIR__).'/';

define("ROOT_FOLDER",basename(__DIR__));

define("BASE_URL", $url);

//Define absolute path to this folder. I.E /home/mike/www/ETS/
define("ABS_PATH", getcwd().'/');

require 'lib/web_application.php';

//The main application
$app = new web_application();




?>
