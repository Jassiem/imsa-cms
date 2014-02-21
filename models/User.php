<?php

  class User{

    public $username = null;
    public $email = null;
    public $password_hash = null;
    public $salt = null;
    //only holds value when new user being crated
    public $confirm_password = null;

    public function __construct($userParameters = array()) {
      if( isset( $userParameters['username'] ) ){
        $this->username = $userParameters['username'];
      }
      if( isset( $userParameters['password'] ) ){
        $this->password_hash = $userParameters['password'];
      }
      if( isset( $userParameters['email'] ) ){
        $this->email = $userParameters['email'];
      }
      if( isset( $userParameters['salt'] ) ){
        $this->salt = $userParameters['salt'];
      }
      if( isset( $userParameters['password_hash'] ) ){
        $this->password_hash = $userParameters['password_hash'];
      }
    }

    /**
      * Returns a User object matching the given user ID
      *
      * @param int The user ID
      * @return News|false The user object, or false if the record was not found or there was a problem
      */
   
      public static function getByUsername( $username ) {
        try{
          $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
          $sql = "SELECT * FROM users WHERE username = :username";
          $st = $conn->prepare( $sql );
          $st->bindValue( ":username", $username, PDO::PARAM_INT );
          $st->execute();
          $row = $st->fetch();
          $conn = null;
          if ( $row ) return new User( $row );
        }
        catch(PDOException $e){
          //log message and then return false
          error_log('Unable to connect to the database.  \n' . $e->getMessage());
          return new User();
        }
      }

      public function save( ){
        self::generateSalt();
        $encrypted_password = self::encryptPassword($this->salt, $this->password_hash);
        
        try{
          $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
          $sql = "INSERT INTO users (username, email, password_hash, salt) VALUES (:username, :email, :encrypted_password, :salt )";
          $st = $conn->prepare( $sql );

          //bind values
          $st->bindValue( ":username", $this->username, PDO::PARAM_INT );
          $st->bindValue( ":email", $this->email, PDO::PARAM_STR );
          $st->bindValue( ":encrypted_password", $encrypted_password, PDO::PARAM_STR );
          $st->bindValue( ":salt", $this->salt, PDO::PARAM_STR );

          if($st->execute())
          {
            return true;
          }else{
            print_r($st->errorInfo());
            return false;
          }
        }
        catch(PDOException $e){
          //log message and then return false
          error_log('Unable to connect to the database.  \n' . $e->getMessage());
          return false;
        }   
      }

      //checks if object data has errors
      public function hasErrors(){
        $usernameErrors; $emailErrors; $passwordErrors;
        if( $usernameErrors = validateUsername() || $emailErrors = validateEmail() || $passwordErrors = validatePassword()){
          return array( "hasErrors" => true, "errors" => array( "username" => $usernameErrors, "email" => $emailErrors, 
                "passwordErrors" => $passwordErrors ) );
        }
        else{
          return false;
        }

      }

      private function validateUsername(){
        return filter_var( $this->username, FILTER_VALIDATE_REGEX, array( "options" => array( "regexp" => "/^[a-zA-z]+[0-9]*{5,20}$/" ) ) );

      }

      private function validateEmail(){
        return filter_var( $this->email, FILTER_VALIDATE_EMAIL );
      }

      //check if password and confirm_password are the same
      private function validatePassword(){
        return $this->password === $this->confirm_password;
      }

      private function generateSalt(){
        $salt = uniqid('', true);
        $this->salt = $salt;
      }

      /**
    * Encrypts a password using SHA 256
    *
    * @param string The unecrypted password.
    * @return string The encrypted password.
      */
      private function encryptPassword($salt, $password ) {
        $encrypted_password = hash("sha256", $salt . $password);
        return $encrypted_password;
      }

      public static function matchPassword( $username, $password ) {
        $user = self::getByUsername( $username );

        if( $user ){
          $encrypted_login_password = self::encryptPassword($user->salt, $password);
          return $encrypted_login_password == $user->password_hash;
        }
        else{
          return false;
        }
      }
 
  }


?>