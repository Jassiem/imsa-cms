<?php
 
/**
 * Class to handle affiliate model data
 */
 
class Affiliate
{
 
  // Properties
  private $id          = null;
  private $companyName = null;

  /** GETTERS */
  public function getId(){
    return $this->id;
  }
  public function getCompanyName(){
    return $this->companyName;
  }
 
  /**
  * Sets the object's properties using the values in the supplied array
  */
  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id                    = (int) $data['id'];
    if ( isset( $data['company_name'] ) ) $this->companyName = $data['company_name'];
  }
 
  /**
  * Returns an Affiliate object matching the given ID
  */
  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql  = "SELECT * FROM affiliates WHERE id = :id";
    $st   = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();

    $row  = $st->fetch();
    $conn = null;
    if ( $row ) return new Affiliate( $row );
  }
 
  /**
  * Returns all Affiliates in the DB
  */
  public static function getAffiliates() {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM affiliates
            ORDER BY company_name ASC";
 
    $st = $conn->prepare( $sql );
    $st->execute();
    $list = array();
 
    while ( $row = $st->fetch() ) {
      $affiliate = new Affiliate( $row );
      $list[]      = $affiliate;
    }
 
    // close database connection
    $conn = null;
    return $list;
  }
 
  /**
  * Saves the current Affiliate object into the database, and sets its ID property.
  */
  public function save() {
    // Does the Affiliate object already have an ID?
    if ( !is_null( $this->id ) ) trigger_error ( "Affiliate::insert(): Attempt to insert an Affiliate object that already has its ID property set (to $this->id).", E_USER_ERROR );
 
    // Insert the Affiliate object
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO affiliates ( company_name ) VALUES ( :company_name )";
    $st = $conn->prepare ( $sql );

    $st->bindValue( ":company_name", $this->companyName, PDO::PARAM_STR );
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
 
  /**
  * Updates the current Affiliate object in the database.
  */
  public function update($newData) {
    // make sure object has id
    if ( is_null( $this->id ) ) trigger_error ( "Affiliate::update(): Attempt to update an Affiliate object that does not have its ID property set.", E_USER_ERROR );

    // Update the Affiliate object
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql  = "UPDATE affiliates SET company_name=:company_name WHERE id = :id";
    $st   = $conn->prepare ( $sql );

    $st->bindValue( ":company_name", $newData['company_name'], PDO::PARAM_STR );
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
 
  /**
  * Deletes the current Affiliate object from the database.
  */
  public static function delete($id) {
    // Delete the Affiliate object
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM affiliates WHERE id = :id LIMIT 1" );
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
 
}
 
?>