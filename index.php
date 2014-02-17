<?php
	require_once( "config.php" );
	require('Toro.php');

	require_once ('controllers/SessionController.php');
	require_once ('controllers/AdminController.php');
	require_once ('controllers/NewsController.php');
	require_once ('controllers/UserController.php');
	require_once ('controllers/SpotlightController.php');
	require_once ('controllers/PersonController.php');
	require_once ('controllers/HomeController.php');
	require_once ( 'controllers/LocationController.php' );
	require_once ( 'controllers/PeopleController.php' );
	require_once ( 'controllers/ResearchController.php' );
	require_once ( 'controllers/AffiliatesController.php' );
	require_once ( 'controllers/AffiliatesAdminController.php' );

	Toro::serve(array(
		'/' => 'HomeController',
		'/login' => 'SessionController',
		'/logout' => 'SessionController',
	  	'/admin' => 'AdminController',
	  	'/news' => 'NewsController',
	  	'/spotlight' => 'SpotlightController',
	  	'/person' => 'PersonController',
	  	'/user' => 'UserController',
	  	'/home' => 'HomeController',
	  	'/location' => 'LocationController',
	  	'/people' => 'PeopleController',
	  	'/research' => 'ResearchController',
	  	'/affiliates' => 'AffiliatesController',
	  	'/affiliates_admin' => 'AffiliatesAdminController'
	));
?>