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

			$newUser = new User($userParams);
			//save user
			if($newUser->save())
			{
				//redirect to login and return success
			}
			else{
				//display errors and stay on sign up
			}
		}
	}


?>