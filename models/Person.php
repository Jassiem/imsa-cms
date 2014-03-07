<?php
  class Person{

    private $id = null;  
    private $first_name = null;
    private $last_name = null;
    private $title = null;
    private $area = null;
    private $email = null;

    /** GETTERS */
    public function getId(){
      return $this->id;
    }
    public function getFirstName(){
      return $this->first_name;
    }
    public function getLastName(){
      return $this->last_name;
    }
    public function getTitle(){
      return $this->title;
    }
    public function getArea(){
      return $this->area;
    }
    public function getEmail(){
      return $this->email;
    }
   
    /**
    * Sets the object's properties using the values in the supplied array
    */
    public function __construct( $data=array() ) {
    if ( isset( $data['people_id'] ) ) $this->id          = (int) $data['people_id'];
    if ( isset( $data['first_name'] ) ) $this->first_name = $data['first_name'];
    if ( isset( $data['last_name'] ) ) $this->last_name   = $data['last_name'];
    if ( isset( $data['area'] ) ) $this->area             = $data['area'];
    if ( isset( $data['title'] ) ) $this->title           = $data['title'];
    if ( isset( $data['email'] ) ) $this->email           = $data['email'];
    }
   
    /**
    * Returns a Person object matching the given ID
    */
    public static function getById( $id ) {
      try{
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
      $sql  = "SELECT * FROM people WHERE people_id = :id";
      $st   = $conn->prepare( $sql );
      $st->bindValue( ":id", $id, PDO::PARAM_INT );
      $st->execute();
      $row  = $st->fetch();
      $conn = null;
        if ( $row ) return new Person( $row );
    }
      catch(PDOException $e){
        //log message and then return false
        error_log('Unable to connect to the database.  \n' . $e->getMessage());
        return new Person();
      }
    }
   
    /**
    * Get all Person objects in the DB
    */
    public static function getAllPeople( $order='last_name ASC' ) {
      try{
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT * FROM people WHERE is_deleted=0 ORDER BY " . mysql_escape_string($order);
     
        $st = $conn->prepare( $sql );
        $st->execute();
        $list = array();
     
        while ( $row = $st->fetch() ) {
          $person = new Person( $row );
          $list[] = $person;
        }
     
        // close database connection
        $conn = null;
        return $list;
    }
      catch(PDOException $e){
        //log message and then return false
        error_log('Unable to connect to the database.  \n' . $e->getMessage());
        return array();
      }
    }
   
    /**
    * Saves the current Person object into the database, and sets its ID property.
    */
    public function save() {
      try{
        // Does the Person object already have an ID?
        if ( !is_null( $this->id ) ) trigger_error ( "Person::save(): Attempt to insert a Person object that already has its ID property set (to $this->id).", E_USER_ERROR );
     
        // Insert the Person object
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "INSERT INTO people ( first_name, last_name, title, area, email ) VALUES ( :first_name, :last_name, :title, :area, :email )";
        $st = $conn->prepare ( $sql );

        $st->bindValue( ":first_name", $this->first_name, PDO::PARAM_STR );
        $st->bindValue( ":last_name", $this->last_name, PDO::PARAM_STR );
        $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
        $st->bindValue( ":area", $this->area, PDO::PARAM_STR );
        $st->bindValue( ":email", $this->email, PDO::PARAM_STR );
        $st->execute();
        $this->id = $conn->lastInsertId();

        //close database connection
        $conn = null;

        //0 is no error
        if($st->errorCode() == 0){
          return true;
        }else{
          return false;
        }
    }
      catch(PDOException $e){
        //log message and then return false
        error_log('Unable to connect to the database.  \n' . $e->getMessage());
        return false;
      }
    }
   
    /**
    * Updates the current Person object in the database.
    */
    public function update($newData) {
      try{
        // make sure object has id
        if ( is_null( $this->id ) ) trigger_error ( "Person::update(): Attempt to update a Person object that does not have its ID property set.", E_USER_ERROR );

        // Update the Person object
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "UPDATE people SET title=:title, area=:area, email=:email WHERE people_id = :id";
        $st = $conn->prepare ( $sql );

        $st->bindValue( ":title", $newData['title'], PDO::PARAM_STR );
        $st->bindValue( ":area", $newData['area'], PDO::PARAM_STR );
        $st->bindValue( ":email", $newData['email'], PDO::PARAM_STR );
        $st->bindValue( ":id", $this->id, PDO::PARAM_INT );

        $st->execute();
        $conn = null;

        //make sure row was updated
        if($st->rowCount() > 0){
          return true;
        }else{
          return false;
        }
    }
      catch(PDOException $e){
        //log message and then return false
        error_log('Unable to connect to the database.  \n' . $e->getMessage());
        return false;
      }
    }
   
    /**
    * Softly deletes the current Person object from the database.
    */
    public static function delete($id) {
      try{
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $st = $conn->prepare ( "UPDATE people SET is_deleted = 1 WHERE people_id = :id" );
        $st->bindValue( ":id", $id, PDO::PARAM_INT );
        $st->execute();
        $conn = null;

        if($st->rowCount() > 0){
          return true;
        }
        else{
          return false;
        }
      }
      catch(PDOException $e){
        //log message and then return false
        error_log('Unable to connect to the database.  \n' . $e->getMessage());
        return false;
      }
    }
  }

?>