<?php

  class LocationController{
    public $pageInformation;

    public function get(){
      $pageInfo['pageTitle'] = 'Location';
      include(TEMPLATE_PATH . '/location.php');
    }
  }


?>