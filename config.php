<?php
	ini_set( "display_errors", true ); //disable in production
	date_default_timezone_set( "America/New_York" ); 
	define( "DB_DSN", "mysql:host=127.0.0.1;dbname=IMSAcms" );
	define( "DB_USERNAME", "imsaUser" );
	define( "DB_PASSWORD", "imsa2014" );
	define( "CLASS_PATH", "controllers" );
	define( "TEMPLATE_PATH", "templates" );
	define( "UPLOAD_PATH", __DIR__ . '/' ."public/images" );
	define( "HOMEPAGE_NUM_ARTICLES", 5 );
	 
	function handleException( $exception ) {
	  echo "Sorry, a problem occurred. Please try later.\n" . $exception->getMessage();
	  error_log( $exception->getMessage() );
	}
	 
	set_exception_handler( 'handleException' );
?>