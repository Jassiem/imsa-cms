<?php
	//session_start();
	error_reporting( E_ALL );

	require_once( "config.php" );
	require('Toro.php');
	require_once ('controllers/AdminController.php');
	require_once ('controllers/SessionController.php');
	require_once ('controllers/NewsController.php');
	require_once ('controllers/UserController.php');

	Toro::serve(array(
		'/' => 'SessionController',
		'/login' => 'SessionController',
	  	'/admin' => 'AdminController',

	  	//get all news snippets or post
	  	'/news' => 'NewsController',
	  	//get, put, delete news snippet,
	  	'/news/:number' => 'NewsController',

	  	'/user' => 'UserController'
	  	//'/home' => 'HomeController'
	));

?>