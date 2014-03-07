<?php
  require_once( 'models/User.php' );

  class UserController{
    private $pageInformation;

    function __construct(){
      ToroHook::add('before_handler', 'SessionController::checkLogin');
    }

    public function get(){
      $pageInfo['pageTitle'] = 'Add User';
      // display new user form
      include( TEMPLATE_PATH . '/admin/newUserForm.php' );
    }

    //create a new user
    public function post(){
      self::createUser();
    }

    public function createUser() {
      //get data from post array
      $userParams['username'] = $_POST['username'];
      $userParams['password'] = $_POST['password'];
      $userParams['email'] = $_POST['email'];

      $hasConfirmedPassword = ($userParams['password'] == $_POST['confirm_password']);

      $newUser = new User($userParams);
      //save user
      if($hasConfirmedPassword) {
        if($newUser->save()) {
          $host = $_SERVER['HTTP_ORIGIN'];
          echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/admin">';
        }
        else{
          self::flashError('Unable to create new user.');
        }
      }
      else {
        self::flashError('Passwords need to match.');
      }

    }

    public function flashError($errorMessage) {
        $this->pageInformation['errorMessage'] = $errorMessage;
        $pageInfo['pageTitle'] = 'Add User';
        include( TEMPLATE_PATH . '/admin/newUserForm.php' );
    }
  }
?>