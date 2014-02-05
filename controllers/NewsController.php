<?php 
	require_once ( "models/News.php" );

	class NewsController{
		public $results;

		//add new news snippet to database
		function post() {
			//update news snippet
			if( isset( $_POST['editId'] ) ){
				$newData['title'] = $_POST['title'];
				$newData['contents'] = $_POST['contents'];

				$newsSnippet = News::getById($_POST['editId']);
				if($newsSnippet->update($newData)){
					//success message and display all articles
					$this->results['successMessage'] = "News successfully updated";
					self::listNewsSnippets();
				}
				else{
					$this->results['errorMessage'] = 'Unable to update news snippet.';
					include( TEMPLATE_PATH . '/admin/editNews.php' );
				}
			}
			//create news snippet
			else{
		    	// get news snippet data from post array
		    	$newsData['title'] = $_POST['title'];
		    	$newsData['contents'] = $_POST['contents'];
		    	$newsSnippet = new News($newsData);

		    	if($newsSnippet->save()){
		    		//display success message and list all snippets
		    		$this->results['successMessage'] = 'News successfully added.';
		    		self::listNewsSnippets();
		    	}else{
		    		//display error message and go to add page
		    		$this->results['errorMessage'] = 'Unable to add news snippet.';
		    		include( TEMPLATE_PATH . '/admin/addNews.php' );
		    	}
		    }
		 
		}
		 
		//list all news snippets
		function get() {
			if( isset( $_GET['action'] ) && $_GET['action'] == 'addNews' ){
				$results['pageTitle'] = 'Add News';
				include( TEMPLATE_PATH . "/admin/addNews.php" );
			}
			else if( isset( $_GET['action'] ) && $_GET['action'] == 'edit' ){
				self::editNewsSnippet();
			}
			else if( isset( $_GET['action'] ) && $_GET['action'] == 'delete' ){
				if(News::delete($_GET['newsId'])){
					$this->results['successMessage'] = 'News snippet successfully deleted';
				}
				else{
					$this->results['errorMessage'] = 'Unable to delete news snippet.';
				}
				self::listNewsSnippets();
			}
			else{
				self::listNewsSnippets();
			}

		}

		//get all news snippets and display them
		public function listNewsSnippets(){
			$results = array();
		  	$data = News::getList();
		  	$results['news'] = $data;

		 	// render template
		  	$results['pageTitle'] = "All News Snippets";
		  	include( TEMPLATE_PATH . "/admin/listNews.php" );
		}

		//display edit form and populate it with data
		public function editNewsSnippet(){
			//get id from $_GET array
			$newsId = $_GET['newsId'];
			$newsSnippet = News::getById($newsId);

			$results['pageTitle'] = 'Edit Page';
			include( TEMPLATE_PATH . '/admin/editNews.php' );
		}

}

?>