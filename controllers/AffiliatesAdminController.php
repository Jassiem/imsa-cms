<?php 
  require_once ( 'models/Affiliate.php' );

  class AffiliatesAdminController{
    private $pageInformation;

    function __construct(){
      ToroHook::add('before_handler', 'SessionController::checkLogin');
    }

    //create new affiliate
    function post() {
      self::createAffiliate();
    }
     
    //list all affiliates
    function get() {
      if( isset( $_GET['action'] ) && $_GET['action'] == 'addAffiliate' ){
        self::addAffiliate();
      }
      else if( isset( $_GET['action'] ) && $_GET['action'] == 'delete' ){
        self::deleteAffiliate();
      }
      else{
        self::listAllAffiliates();
      }

    }

    public function createAffiliate(){
          // get affiliate data from post array
      $affiliateData['company_name'] = $_POST['company_name'];
      $affiliate = new Affiliate($affiliateData);

          if($affiliate->save()){
            //display success message and list all affiliates
            $this->pageInformation['successMessage'] = 'Affiliate successfully added.';
            self::listAllAffiliates();
          }else{
            //display error message and go to add page
            $this->pageInformation['errorMessage'] = 'Unable to add affiliate.';
            include( TEMPLATE_PATH . '/admin/addAffiliate.php' );
          }
    }

    //get all affiliates and display them
    public function listAllAffiliates(){
      $results = array();
        $data = Affiliate::getAffiliates();
        $results['affiliates'] = $data;

      // render template
        $pageInfo['pageTitle'] = 'All affiliates';
        include( TEMPLATE_PATH . '/admin/listAffiliates.php' );
    }

    //add an affiliate
    public function addAffiliate(){
      $pageInfo['pageTitle'] = 'Add Affiliate';
      include( TEMPLATE_PATH . '/admin/addAffiliate.php' );
    }

    //delete an affiliate
    public function deleteAffiliate(){
      if(Affiliate::delete($_GET['affiliateId'])){
        $this->pageInformation['successMessage'] = 'affiliate successfully deleted';
      }
      else{
        $this->pageInformation['errorMessage'] = 'Unable to delete affiliate.';
      }
      self::listAllAffiliates();
    }
}

?>