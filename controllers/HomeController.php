<?php
  require_once('models/News.php');
  require_once('models/Spotlight.php');

  class HomeController{
    public $pageInformation;

    public function get(){
      //get dynamic page data
      $newsItems = News::getList(2);
      $spotlights = Spotlight::getSpotlights();

      $pageInfo['pageTitle'] = 'Home';
      include(TEMPLATE_PATH . '/home.php');
    }
  }


?>