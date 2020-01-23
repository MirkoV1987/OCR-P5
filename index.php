<?php

//App Root
$site_path = $_SERVER['DOCUMENT_ROOT'];
$current_path = __FILE__;
$current_path = str_replace('\\', '/', $current_path);
$app_path = dirname(str_replace($site_path, '', $current_path));

if (!defined('APP_DIR')) {
    define('APP_DIR', $app_path);
}

require 'vendor/autoload.php';

//Set Timezone
if (function_exists("date_default_timezone_set")) {
    date_default_timezone_set("Europe/Paris");
}

\Framework\Session::getSession();

$router = new \Framework\Router();
$router->routingRequest();
