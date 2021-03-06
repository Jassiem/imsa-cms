<?php

  class Spotlight{
    private $id;
    private $image_name;
    private $description;
    private $info_link;

    /*GETTERS*/
    public function getId(){
      return $this->id;
    }
    public function getImageName(){
      return $this->image_name;
    }
    public function getDescription(){
      return $this->description;
    }
    public function getInfoLink(){
      return $this->info_link;
    }

    public function __construct($spotlightParams){
      if( isset( $spotlightParams['spotlight_id'] ) ){
        $this->id = $spotlightParams['spotlight_id'];
      }
      if( isset( $spotlightParams['image_name'] ) ){
        $this->image_name = $spotlightParams['image_name'];
      }
      if( isset( $spotlightParams['description'] ) ){
        $this->description = $spotlightParams['description'];
      }
      if( isset( $spotlightParams['info_link'] ) ){
        $this->info_link = $spotlightParams['info_link'];
      }
    }

    /**
      * Returns a Spotlight object matching the given article ID
      */     
    public static function getById( $id ) {
      try{
          $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
          $sql = "SELECT * FROM spotlight WHERE spotlight_id = :id";
          $st = $conn->prepare( $sql );
          $st->bindValue( ":id", $id, PDO::PARAM_INT );
          $st->execute();
          $row = $st->fetch();
          $conn = null;
          if ( $row ) return new Spotlight( $row );
      }
        catch(PDOException $e){
          //log message and then return false
          error_log('Unable to connect to the database.  \n' . $e->getMessage());
          return new Spotlight();
        }
    }
     
     
    /**
      * Returns specified range of Spotlight objects in the DB
    */
     
    public static function getSpotlights( $numRows=10, $order="last_update DESC" ) {
      try{
          $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
          $sql = "SELECT spotlight_id, image_name, description, info_link FROM spotlight
                  ORDER BY " . mysql_escape_string($order) . " LIMIT :numRows";
       
          $st = $conn->prepare( $sql );
          $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
          $st->execute();
          $list = array();
       
          while ( $row = $st->fetch() ) {
            $newsSnippet = new Spotlight( $row );
            $list[] = $newsSnippet;
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
      * Saves the current Spotlight object into the database, and sets its ID property.
      */
     
    public function save() {
      try{
          // Does the Spotlight object already have an ID?
          if ( !is_null( $this->id ) ) trigger_error ( "Spotlight::insert(): Attempt to insert a Spotlight object that already has its ID property set (to $this->id).", E_USER_ERROR );
       
          // Insert the Spotlight object
          $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
          $sql = "INSERT INTO spotlight ( image_name, description, info_link ) VALUES ( :image_name, :description, :info_link )";
          $st = $conn->prepare ( $sql );

          $st->bindValue( ":image_name", $this->image_name, PDO::PARAM_STR );
          $st->bindValue( ":description", $this->description, PDO::PARAM_STR );
          $st->bindValue( ":info_link", $this->info_link, PDO::PARAM_STR );
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
    * Updates the current Spotlight object in the database.
    */
     
    public function update($newData) {
      try{
          // make sure object has id
          if ( is_null( $this->id ) ) trigger_error ( "Spotlight::update(): Attempt to update a News object that does not have its ID property set.", E_USER_ERROR );

          // Update the Spotlight object
          $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
          $sql = "UPDATE spotlight SET description=:description, info_link=:info_link WHERE spotlight_id=:id";
          $st = $conn->prepare ( $sql );

          $st->bindValue( ":description", $newData['description'], PDO::PARAM_STR );
          $st->bindValue( ":info_link", $newData['info_link'], PDO::PARAM_STR );
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
    * Deletes the current Spotlight object from the database.
    */
     
    public static function delete($id) {
      try{
          // Delete the Spotlight object
          $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
          $st = $conn->prepare ( "DELETE FROM spotlight WHERE spotlight_id = :id LIMIT 1" );
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

    /*
    * Save image file to server.
    *
    */
    public static function saveImageFile($fileData){
      $imageWhiteList = array('jpg', 'jpeg', 'png', 'bmp', 'gif');
      $fileName = $fileData['name'];

      $fileNameParts = explode('.', $fileName);
      $imageType = end($fileNameParts);

      if(!in_array($imageType, $imageWhiteList)){
        return false;
      }

      $uploadedFile = $fileData['tmp_name'];
      return move_uploaded_file($uploadedFile, UPLOAD_PATH . '/' . $fileName);
    }

    /*
    * Delete image file from server.
    */
    public static function deleteImageFile($fileName){
      return unlink(UPLOAD_PATH . '/' . $fileName);
    }
  }

?>