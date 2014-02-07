<?php
	error_reporting( E_ALL );
	ini_set( "display_errors", true ); //disable in production
	date_default_timezone_set( "America/New_York" ); 
	define( "DB_DSN", "mysql:host=127.0.0.1;dbname=IMSAcms" );
	define( "DB_USERNAME", "imsaUser" );
	define( "DB_PASSWORD", "imsa2014" );
	define( "CLASS_PATH", "controllers" );
	define( "TEMPLATE_PATH", 'public/templates' );
	define( "UPLOAD_PATH", 'public/images' );
	define( "ASSET_PATH", 'public/' );
	 
	function handleException( $exception ) {
	  echo "Sorry, a problem occurred. Please try later.\n" . $exception->getMessage();
	  error_log( $exception->getMessage() );
	}
	 
	set_exception_handler( 'handleException' );
?>