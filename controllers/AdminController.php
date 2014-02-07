<?php

class AdminController{
   
   //display admin home page
   public function get(){
   	$pageInfo['pageTitle'] = 'Administrator Home';
    include( TEMPLATE_PATH . '/admin/adminHome.php' );
   }

}
 
?>