<?php

  class ResearchController{
    public $pageInformation;

    public function get(){
      $pageInfo['pageTitle'] = 'Research';
      include(TEMPLATE_PATH . '/research.php');
    }
  }


?>