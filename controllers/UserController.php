<?php
	require_once( "models/User.php" );

	class UserController{
		private $pageInformation;

		function __construct(){
			ToroHook::add("before_handler", 'SessionController::checkLogin');
		}

		//display news user form
		public function get(){
			$pageInfo['pageTitle'] = 'New User';
			include( TEMPLATE_PATH . '/admin/newUserForm.php' );
		}

		//create a new user
		public function post(){
			self::createUser();
		}

		public function createUser(){
			//get data from post array
			$userParams['username'] = $_POST['username'];
			$userParams['password'] = $_POST['password'];
			$userParams['email'] = $_POST['email'];

			$newUser = new User($userParams);
			//save user
			if($newUser->save())
			{
				$host = $_SERVER['HTTP_ORIGIN'];
				header("Location: ". $host . "/admin", true, 200);
			}
			else{
				$this->pageInformation['errorMessage'] = "Unable to create new user.";
				include( TEMPLATE_PATH . '/admin/newUserForm.php' );
			}
		}
	}
?>