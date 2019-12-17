<?php

require_once 'vendor/autoload.php';

\Framework\Session::getSession();

$router = new \Framework\Router();
$router->routingRequest();