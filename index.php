<?php
session_start();

require_once('vendor/autoload.php');

$router = new \Framework\Router();
$router->routingRequest();