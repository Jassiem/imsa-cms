<?php
	require_once ('models/User.php');
	session_start();

	class SessionController{
		private $pageInformation;

		//get login template
		function get(){
			//set page title for template
			$pageInfo['pageTitle'] = 'Login';
			include( TEMPLATE_PATH . '/admin/loginForm.php' );
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
				$this->pageInformation['errorMessage'] = 'Invalid login information.';
				$pageInfo['pageTitle'] = 'Login';
				include( TEMPLATE_PATH . '/admin/loginForm.php' );
			}
		}

		private function logout() {
		    unset( $_SESSION['username'] );
		    session_destroy();

		    $host = $_SERVER['HTTP_ORIGIN'];
		    //route to imsa home page after logout
		    header( 'Location:'. $host. '/home', true, 200 );
		}
	}

?>