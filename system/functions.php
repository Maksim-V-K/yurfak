<?php
function modules_include( $HTML )
{
	require 'settings.php';
	
	global $requested_page, $requested_vars;

	$modules_list = explode( "<!--module:" , $HTML );
	$modules_size = sizeof( $modules_list );
	for( $modules_i = 1 ; $modules_i < $modules_size ; $modules_i+=2 )
	{
		list( $module , $data ) = explode( "-->" , $modules_list[$modules_i] , 2 );
		
		if( !file_exists( "modules/{$module}.html" ) )
		{
			continue;
		}

		$code = file_get_contents( "modules/{$module}.html" );
		$code = modules_include( $code );
	
		if(isset($_GET['comand']) && $_GET['comand'] == 'editable' )
		{
			$HTML = str_replace( "<!--module:$module--><!--module:$module-->" , "<!--module:$module-->$code<!--module:$module-->" , $HTML );
		}else{
			$HTML = str_replace( "<!--module:$module--><!--module:$module-->" , $code , $HTML );
		}
	
		if( file_exists( "modules/{$module}.php" ) )
		{
			require "modules/{$module}.php";
		}
	}

	return $HTML;
}


function clean_input( $string , $length ){
	$string = trim( $string );
	$string = substr( $string , 0 , $length );
	return $string;
}

?>