<?php
  require_once ('models/User.php');
  session_start();

  class SessionController {
    private $pageInformation;

    //get login template
    function get() {
      if( isset( $_GET['action'] ) && $_GET['action'] == 'logout' ){
        self::logout();
      }
      else{
        //set page title for template
        $pageInfo['pageTitle'] = 'Login';
        include( TEMPLATE_PATH . '/admin/loginForm.php' );
      }
    }

    //login user and store id in session
    function post() {
      self::login();
    }

    public function login(){
      //get username and password from $_POST
      $username = $_POST['username'];
      $password = $_POST['password'];
      $host = $_SERVER['HTTP_ORIGIN'];

      //authenticate
      if(User::matchPassword($username, $password)) {
        //set session and redirect to admin home
        $_SESSION['username'] = $username;
        header("Location:". $host . '/admin');
      }
      else {
        //display errors and stay on login page
        $this->pageInformation['errorMessage'] = 'Invalid login information.';
        $pageInfo['pageTitle'] = 'Login';
        include( TEMPLATE_PATH . '/admin/loginForm.php' );
      }
    }

    public static function checkLogin() {
      //make sure username variable is set
      if( isset( $_SESSION['username'] ) ) {
        return true;
      } else {
        //redirect to login page
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/login">'; 
        exit;     
      }
    }

    private function logout() {
        unset( $_SESSION['username'] );
        session_destroy();

        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/home">';    
            exit; 
    }
  }

?>