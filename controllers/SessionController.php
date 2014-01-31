<?php
	//require_once ('models/User.php');

	class SessionController{
		//get login template
		function get(){
			include('templates/admin/loginForm.php');
		}

		//login user and store id in session
		function post(){
			//get username and password from $_POST
			$username = $_POST['username'];
			$password = $_POST['password'];

			//authenticate
			if(User::matchPassword($username, $password)){
				//set session and redirect to admin home
				$_SESSION['username'] = $username;
				http_redirect("/admin", array(), true, HTTP_REDIRECT_PERM);
			}
			else{
				//display errors and stay on login page
			}

		}

		private function logout() {
		    unset( $_SESSION['username'] );
		    //route to index after logout
		    header( "Location: /admin" );
		}
	}

?>