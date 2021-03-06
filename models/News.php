<?php
 
/**
 * Class to handle news model data
 */
 
class News
{
 
  // Properties
  private $id = null;
  private $title = null;
  private $link = null;
  private $contents = null;

  /** GETTERS */
  public function getId(){
    return $this->id;
  }
  public function getTitle(){
    return $this->title;
  }
  public function getLink(){
    return $this->link;
  }
  public function getContents(){
    return $this->contents;
  }
 
  /**
  * Sets the object's properties using the values in the supplied array
  */
  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id             = (int) $data['id'];
    if ( isset( $data['title'] ) ) $this->title       = $data['title'];
    if ( isset( $data['link'] ) ) $this->link         = $data['link'];
    if ( isset( $data['contents'] ) ) $this->contents = $data['contents'];
  }
 
  /**
  * Returns an Article object matching the given article ID
  */
  public static function getById( $id ) {
    try{
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
      $sql  = "SELECT * FROM news WHERE id = :id";
      $st   = $conn->prepare( $sql );
      $st->bindValue( ":id", $id, PDO::PARAM_INT );
      $st->execute();

      $row  = $st->fetch();
      $conn = null;
      if ( $row ) return new News( $row );
    }
    catch(PDOException $e){
      //log message and then return false
      error_log('Unable to connect to the database.  \n' . $e->getMessage());
      return new News();
    }
  }
 
  /**
  * Returns a range of News objects in the DB
  */
  public static function getList( $numRows=10, $order="last_update DESC" ) {
    try{
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
      $sql = "SELECT id, title, link, contents FROM news
              ORDER BY " . mysql_escape_string($order) . " LIMIT :numRows";
   
      $st = $conn->prepare( $sql );
      $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
      $st->execute();
      $list = array();
   
      while ( $row = $st->fetch() ) {
        $newsSnippet = new News( $row );
        $list[]      = $newsSnippet;
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
  * Saves the current NewsModel object into the database, and sets its ID property.
  */
  public function save() {
    try{
      // Does the News object already have an ID?
      if ( !is_null( $this->id ) ) trigger_error ( "News::insert(): Attempt to insert a News object that already has its ID property set (to $this->id).", E_USER_ERROR );
   
      // Insert the News object
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
      $sql = "INSERT INTO news ( title, contents, link ) VALUES ( :title, :contents, :link )";
      $st = $conn->prepare ( $sql );

      $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
      $st->bindValue( ":contents", $this->contents, PDO::PARAM_STR );
      $st->bindValue( ":link", $this->link, PDO::PARAM_STR );
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
  * Updates the current News object in the database.
  */
  public function update($newData) {
    try{
      // make sure object has id
      if ( is_null( $this->id ) ) trigger_error ( "News::update(): Attempt to update a News object that does not have its ID property set.", E_USER_ERROR );

      // Update the News object
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
      $sql  = "UPDATE news SET title=:title, contents=:contents, link=:link WHERE id = :id";
      $st   = $conn->prepare ( $sql );

      $st->bindValue( ":title", $newData['title'], PDO::PARAM_STR );
      $st->bindValue( ":contents", $newData['contents'], PDO::PARAM_STR );
      $st->bindValue( ":link", $newData['link'], PDO::PARAM_STR );
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
  * Deletes the current News object from the database.
  */
  public static function delete($id) {
    try{
      // Delete the News object
      $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
      $st = $conn->prepare ( "DELETE FROM news WHERE id = :id LIMIT 1" );
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