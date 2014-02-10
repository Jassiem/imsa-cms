<?php
	require_once('models/Person.php');

	class PeopleController{
		public $pageInformation;

		public function get(){
			//get dynamic page data
			$people = Person::getAllPeople();

			$pageInfo['pageTitle'] = 'People';
			include(TEMPLATE_PATH . '/people.php');
		}
	}


?>