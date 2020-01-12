<?php

require 'vendor/autoload.php';

//Set Timezone
if (function_exists("date_default_timezone_set") ) {

    date_default_timezone_set("Europe/Paris");

}

\Framework\Session::getSession();

$router = new \Framework\Router();
$router->routingRequest();