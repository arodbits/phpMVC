<?php

//# Error checking
// We set the error reporting feature so we can know what's going on in production mode

// error_reporting(E_ALL) indicates which php error levels are reported.
error_reporting(E_ALL);
// ini_set("display_error",1) set the display_option to true in the php.ini configuration file
ini_set("display_errors",1);

// Loading the init.php file. The bootstrap
include_once '../app/init.php';

$app = new App;


?>