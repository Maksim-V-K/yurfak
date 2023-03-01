<?php
$password = 'aadmin';
$login = 'admin';

$time_now = time();
$time_now_Y = date( 'Y' , $time_now );
$time_now_m = date( 'm' , $time_now );
$time_now_d = date( 'd' , $time_now );

if( isset( $_SERVER['HTTP_CLIENT_IP'] ) )
	$ip_current_user = $_SERVER['HTTP_CLIENT_IP'];
elseif( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
	$ip_current_user = $_SERVER['HTTP_X_FORWARDED_FOR'];
elseif( isset( $_SERVER['HTTP_X_FORWARDED'] ) )
	$ip_current_user = $_SERVER['HTTP_X_FORWARDED'];
elseif( isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'] ) )
	$ip_current_user = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
elseif( isset( $_SERVER['HTTP_FORWARDED_FOR'] ) )
	$ip_current_user = $_SERVER['HTTP_FORWARDED_FOR'];
elseif( isset( $_SERVER['HTTP_FORWARDED'] ) )
	$ip_current_user = $_SERVER['HTTP_FORWARDED'];
elseif( isset( $_SERVER['REMOTE_ADDR'] ) )
	$ip_current_user = $_SERVER['REMOTE_ADDR'];
else
	$ip_current_user = '0.0.0.0';

?>