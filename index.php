<?php
	//session_start();
	error_reporting( E_ALL );

	require_once( "config.php" );
	require('Toro.php');
	require_once ('controllers/SessionController.php');
	require_once ('controllers/AdminController.php');
	require_once ('controllers/NewsController.php');
	require_once ('controllers/UserController.php');
	require_once ('controllers/SpotlightController.php');

	Toro::serve(array(
		'/' => 'SessionController',
		'/login' => 'SessionController',
	  	'/admin' => 'AdminController',
	  	'/news' => 'NewsController',
	  	'/spotlight' => 'SpotlightController',
	  	'/user' => 'UserController'
	  	//'/home' => 'HomeController'
	));

?>