<?php
	require_once('models/Affiliate.php');

	class AffiliatesController{
		public $pageInformation;

		public function get(){
			//get dynamic page data
			$affiliates = Affiliate::getAffiliates();

			$pageInfo['pageTitle'] = 'Affilates';
			include(TEMPLATE_PATH . '/affiliates.php');
		}
	}


?>