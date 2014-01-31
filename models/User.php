<?php

	class User{

		public $username = null;
		public $password_hash = null;
		public $salt = null;

		public function __construct($userParameters = array()) {
			if( isset( $userParameters['username'] ) ){
				$this->username = $userParameters['username'];
			}
			if( isset( $userParameters['password'] ) ){
				$this->password_hash = $userParameters['password'];
			}
		}

		/**
	  	* Returns a User object matching the given user ID
	  	*
	  	* @param int The user ID
	  	* @return News|false The user object, or false if the record was not found or there was a problem
	  	*/
	 
	  	public static function getByUsername( $username ) {
	    	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	    	$sql = "SELECT * FROM users WHERE username = :username";
	    	$st = $conn->prepare( $sql );
	    	$st->bindValue( ":username", $username, PDO::PARAM_INT );
	    	$st->execute();
	    	$row = $st->fetch();
	    	$conn = null;
	    	if ( $row ) return new User( $row );
	  	}

	  	public function save( ){
	  		$encrypted_password = encryptPassword($this->password_hash);
	    	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	    	$sql = "INSERT INTO TABLE users (username, password_hash, salt) VALUES (:username, :encrypted_password, :salt )";
	    	$st = $conn->prepare( $sql );

	    	//bind values
	    	$st->bindValue( ":username", $this->username, PDO::PARAM_INT );
	    	$st->bindValue( ":encrypted_password", $encrypted_password, PDO::PARAM_STRING );
	    	$st->bindValue( ":salt", $this->salt, PDO::PARAM_STRING );

	    	return $st->execute();
	    	
	  	}

	  	/**
		* Encrypts a password using SHA 256
		*
		* @param string The unecrypted password.
		* @return string The encrypted password.
	  	*/
	  	private function encryptPassword( $password ) {
	  		//generate random salt
	  		$salt = mcrypt_create_iv(64, MCRYPT_DEV_URANDOM);
	  		$this->salt = $salt;
	  		$encrypted_password = hash("sha256", $salt . $password);
	  		return $encrypted_password;
	  	}

	  	public static function matchPassword( $username, $password ) {
	  		$user = self::getByUsername( $username );

	    	/*if( $user ){
	    		$encrypted_login_password = encryptPassword($user.salt, $password);
	    		return $encrypted_login_password == $user.password_hash;
	    	}
	    	else{
	    		return false;
	    	}*/ 
	    	return true;
	  	}
 
	}


?>