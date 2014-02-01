<?php
	require_once( "models/User.php" );

	class UserController{
		//display news user form
		public function get(){
			include('templates/admin/newUserForm.php');
		}

		//create a new user
		public function post(){
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
				echo 'Failure';
				//display errors and stay on sign up
			}
		}
	}


?>