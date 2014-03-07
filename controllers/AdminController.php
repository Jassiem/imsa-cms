<?php

class AdminController{

  function __construct(){
    ToroHook::add('before_handler', 'SessionController::checkLogin');
  }
   
   //display admin home page
   public function get(){
    $pageInfo['pageTitle'] = 'Administrator Home';
    include( TEMPLATE_PATH . '/admin/adminHome.php' );
   }

}
 
?>