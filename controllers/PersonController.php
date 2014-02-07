<?php
	require_once('models/Person.php');

	class PersonController{
		public $results;

		function post() {
			//update person
			if( isset( $_POST['editId'] ) ){
				$newData['title'] = $_POST['title'];
				$newData['area'] = $_POST['area'];
				$newData['email'] = $_POST['email'];

				$person = Person::getById($_POST['editId']);
				if($person->update($newData)){
					//success message and display all articles
					$this->results['successMessage'] = "Person successfully updated";
					self::listPeople();
				}
				else{
					$this->results['errorMessage'] = 'Unable to update person.';
					include( TEMPLATE_PATH . '/admin/editPerson.php' );
				}
			}
			//create person
			else{
		    	// get person data from post array
				$personData['first_name'] = $_POST['first_name'];
				$personData['last_name']  = $_POST['last_name'];
				$personData['title']      = $_POST['title'];
				$personData['area']       = $_POST['area'];
				$personData['email']      = $_POST['email'];
		    	$person = new Person($personData);

		    	if($person->save()){
		    		//display success message and list all people
		    		$this->results['successMessage'] = 'Person successfully added.';
		    		self::listPeople();
		    	}else{
		    		//display error message and go to add page
		    		$this->results['errorMessage'] = 'Unable to add person.';
		    		include( TEMPLATE_PATH . '/admin/addPerson.php' );
		    	}
		    }
		}

		function get() {
			if( isset( $_GET['action'] ) && $_GET['action'] == 'addPerson' ){
				$results['pageTitle'] = 'Add Person';
				include( TEMPLATE_PATH . "/admin/addPerson.php" );
			}
			else if( isset( $_GET['action'] ) && $_GET['action'] == 'edit' ){
				self::editPerson();
			}
			else if( isset( $_GET['action'] ) && $_GET['action'] == 'delete' ){
				if(Person::delete($_GET['personId'])){
					$this->results['successMessage'] = 'Person successfully deleted';
				}
				else{
					$this->results['errorMessage'] = 'Unable to delete person.';
				}
				self::listPeople();
			}
			else{
				self::listPeople();
			}
		}

		//get all people and display them
		public function listPeople(){
			$results = array();
		  	$data = Person::getAllPeople();
		  	$results['people'] = $data;

		 	// render template
		  	$results['pageTitle'] = "All People";
		  	include( TEMPLATE_PATH . "/admin/listPeople.php" );
		}

		//display edit form and populate it with data
		public function editPerson(){
			//get id from $_GET array
			$personId = $_GET['personId'];
			$person = Person::getById($personId);

			$results['pageTitle'] = 'Edit Page';
			include( TEMPLATE_PATH . '/admin/editPerson.php' );
		}
	}

?>