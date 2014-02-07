<?php
	require_once('models/Spotlight.php');

	class SpotlightController{

		public $results;

		function post() {
			//update spotlight
			if( isset( $_POST['editId'] ) ){
				$newData['description'] = $_POST['description'];
				$newData['info_link'] = $_POST['info_link'];

				$spotlight = Spotlight::getById($_POST['editId']);
				if($spotlight->update($newData)){
					//success message and display all spotlights
					$this->results['successMessage'] = "Spotlight successfully updated";
					self::listAllSpotlights();
				}
				else{
					$this->results['errorMessage'] = 'Unable to update spotlight.';
					include( TEMPLATE_PATH . '/admin/editSpotlight.php' );
				}
			}
			//create spotlight
			else{
				$spotlightData['image_name'] = $_FILES['image_name']['name'];
				$spotlightData['description'] = $_POST['description'];
				$spotlightData['info_link'] = $_POST['info_link'];
		    	$spotlight = new Spotlight($spotlightData);

		    	//save file data before storing object
		    	if(Spotlight::saveImageFile($_FILES['image_name']) && $spotlight->save()){
		    		//display success message and list all spotlights
		    		$this->results['successMessage'] = 'Spotlight successfully added.';
		    		self::listAllSpotlights();
		    	}else{
		    		//delete image file since object storage failed
		    		Spotlight::deleteImageFile($spotlight->getImageName());

		    		//display error message and go to add page
		    		$this->results['errorMessage'] = 'Unable to add spotlight.';
		    		include( TEMPLATE_PATH . '/admin/addSpotlight.php' );
		    	}
		    }
		 
		}
		 
		function get() {
			if( isset( $_GET['action'] ) && $_GET['action'] == 'addSpotlight' ){
				$results['pageTitle'] = 'Add Spotlight';
				include( TEMPLATE_PATH . "/admin/addSpotlight.php" );
			}
			else if( isset( $_GET['action'] ) && $_GET['action'] == 'edit' ){
				self::editSpotlight();
			}
			else if( isset( $_GET['action'] ) && $_GET['action'] == 'delete' ){
				$spotlight = Spotlight::getById($_GET['spotlightId']);

				if(Spotlight::deleteImageFile($spotlight->getImageName()) && Spotlight::delete($_GET['spotlightId'])){
					$this->results['successMessage'] = 'Spotlight successfully deleted';
				}
				else{
					$this->results['errorMessage'] = 'Unable to delete spotlight.';
				}
				self::listAllSpotlights();
			}
			else{
				self::listAllSpotlights();
			}

		}

		//get all spotlights and display them
		public function listAllSpotlights(){
			$results = array();
		  	$data = Spotlight::getSpotlights();
		  	$results['spotlights'] = $data;

		 	// render template
		  	$results['pageTitle'] = "All Spotlights";
		  	include( TEMPLATE_PATH . "/admin/listSpotlights.php" );
		}

		//display edit form and populate it with data
		public function editSpotlight(){
			//get id from $_GET array
			$spotlightId = $_GET['spotlightId'];
			$spotlight = Spotlight::getById($spotlightId);

			$results['pageTitle'] = 'Edit Page';
			include( TEMPLATE_PATH . '/admin/editSpotlight.php' );
		}
	}

?>