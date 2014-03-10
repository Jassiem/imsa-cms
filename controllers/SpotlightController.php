<?php
  require_once('models/Spotlight.php');

  class SpotlightController{

    private $pageInformation;

    function __construct(){
      ToroHook::add('before_handler', 'SessionController::checkLogin');
    }

    function post() {
      self::createSpotlight();
    }
     
    function get() {
      if( isset( $_GET['action'] ) && $_GET['action'] == 'addSpotlight' ){
        $pageInfo['pageTitle'] = 'Add Spotlight';
        include( TEMPLATE_PATH . "/admin/addSpotlight.php" );
      }
      else if( isset( $_GET['action'] ) && $_GET['action'] == 'delete' ){
        self::deleteSpotlight();
      }
      else{
        self::listAllSpotlights();
      }
    }

    //get all spotlights and display them
    public function listAllSpotlights(){
      $results = array();
        $data = Spotlight::getSpotlights();
        $results['spotlights'] = $data;

      // render template
        $pageInfo['pageTitle'] = "All Spotlights";
        include( TEMPLATE_PATH . "/admin/listSpotlights.php" );
    }

    //create a spotlight
    public function createSpotlight(){
      //remove forbidden characters from file name
      $spotlightData['image_name'] = $_FILES['image_name']['name'];
      $spotlight = new Spotlight($spotlightData);

      $pageInfo['pageTitle'] = 'Add Spotlight';

      //save file data before storing object
      if(Spotlight::saveImageFile($_FILES['image_name']) && $spotlight->save()){
        //display success message and list all spotlights
        $this->pageInformation['successMessage'] = 'Spotlight successfully added.';
        self::listAllSpotlights();
      }else{
        //delete image file since object storage failed
        Spotlight::deleteImageFile($spotlight->getImageName());

        //display error message and go to add page
        $this->pageInformation['errorMessage'] = 'Unable to add spotlight.';
        include( TEMPLATE_PATH . '/admin/addSpotlight.php' );
      }
    }

    //delete a spotlight
    public function deleteSpotlight(){
      $spotlight = Spotlight::getById($_GET['spotlightId']);

      if(Spotlight::deleteImageFile($spotlight->getImageName()) && Spotlight::delete($_GET['spotlightId'])){
        $this->pageInformation['successMessage'] = 'Spotlight successfully deleted';
      }
      else{
        $this->pageInformation['errorMessage'] = 'Unable to delete spotlight.';
      }
      self::listAllSpotlights();
    }
  }

?>