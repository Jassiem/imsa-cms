<?php

class AdminController{
   
   //display admin home page
   public function get(){
   	$results['pageTitle'] = 'Administrator Home';
    include('templates/admin/adminHome.php');
   }

}
 
?>