<?php
	require_once ('models/User.php');
	session_start();

	class SessionController{
		private $results;
		//get login template
		function get(){
			//set page title for template
			$results['pageTitle'] = 'Login';
			include('templates/admin/loginForm.php');
		}

		//login user and store id in session
		function post(){
			//get username and password from $_POST
			$username = $_POST['username'];
			$password = $_POST['password'];
			$host = $_SERVER['HTTP_ORIGIN'];

			//authenticate
			if(User::matchPassword($username, $password)){
				//set session and redirect to admin home
				$_SESSION['username'] = $username;
				header("Location:". $host . '/admin');
			}
			else{
				//display errors and stay on login page
				$this->results['errorMessage'] = 'Invalid login information.';
				include('templates/admin/loginForm.php');
			}
		}

		private function logout() {
		    unset( $_SESSION['username'] );
		    session_destroy();
		    //route to imsa home page after logout
		    header( "Location: /admin", true, 200 );
		}
	}

?>