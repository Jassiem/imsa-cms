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
		 
		//edit a news snippet
		function put() {
		  	$results = array();
		  	$results['pageTitle'] = "Edit News Snippet";
		  	$results['formAction'] = "editNews";
		 
		  	if ( isset( $_POST['saveChanges'] ) ) {
		    	// User has posted the article edit form: save the article changes
		 
		    	if ( !$news = News::getById( (int)$_POST['newsId'] ) ) {
		      		header( "Location: admin.php?error=newsSnippetNotFound" );
		      		return;
		    	}
		 
		    	$news->storeFormValues( $_POST );
		    	$news->update();
		    	header( "Location: admin.php?status=changesSaved" );
		 
		  	} elseif ( isset( $_POST['cancel'] ) ) {
		    	// User has cancelled their edits: return to the article list
		    	header( "Location: admin.php" );
		  	} else {
		    	// User has not posted the article edit form yet: display the form
		    	$results['news'] = News::getById( (int)$_GET['newsId'] );
		    	require( TEMPLATE_PATH . "/admin/editNews.php" );
		  }
		 
		}
		 
		//remove news snippet from database
		function delete() {
		  	if ( !$article = Article::getById( (int)$_GET['articleId'] ) ) {
		    	header( "Location: admin.php?error=articleNotFound" );
		    	return;
		  	}
		 
		  	$article->delete();
		  	header( "Location: admin.php?status=articleDeleted" );
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