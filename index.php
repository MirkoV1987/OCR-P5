<?php
session_start();

require_once('Framework/Router.php');

$router = new Router();
$router->routingRequest();


