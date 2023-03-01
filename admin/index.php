<?php
header('Content-Type: text/html; charset=utf-8');
require 'settings.php';
include 'functions.php';

if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_PW'] != $password || $_SERVER['PHP_AUTH_USER'] != $login) {
    header('WWW-Authenticate: Basic realm="Backend"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
}

$uri = strtok($_SERVER['REQUEST_URI'], '?');

require 'modules/header.php';
if(isset($routes[$uri])) { require 'modules/' . $routes[$uri] . '.php'; }
require 'modules/footer.php';
?>