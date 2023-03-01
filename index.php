<?php
require 'settings.php';
require 'functions.php';

session_start();

if(isset($_REQUEST['path'])) {
	$requested_page = $_REQUEST['path'];
} else {
	$requested_vars = explode( '/' , $_SERVER['REQUEST_URI'] );
	$requested_page = strtok($requested_vars[1], '?');
}

$HTML = '';

if(!$requested_page || !file_exists( "pages/{$requested_page}.html" )) $requested_page = "index";

$HTML = file_get_contents("pages/{$requested_page}.html");

$HTML = modules_include($HTML);

if(file_exists( "pages/{$requested_page}.php" )) require( "pages/{$requested_page}.php" );

if(isset($_GET['comand']) && $_GET['comand'] == 'editable')
{
	if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_PW'] != $password || $_SERVER['PHP_AUTH_USER'] != $login) {
		header('WWW-Authenticate: Basic realm="Backend"');
		header('HTTP/1.0 401 Unauthorized');
		echo 'Text to send if user hits Cancel button';
		exit;
	}

	$HTML = str_replace( '<div ' , '<div contenteditable="true" ' , $HTML );
	$HTML = str_replace( '<span ' , '<span contenteditable="true" ' , $HTML );
	$HTML = str_replace( '<a ' , '<a contenteditable="true" ' , $HTML );
	$HTML = str_replace( '&amp;' , '&' , $HTML );
}

echo $HTML;

?>