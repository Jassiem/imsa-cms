<?php 
	require_once ( "models/News.php" );

	class NewsController{
		private $pageInformation;

		function __construct(){
			ToroHook::add("before_handler", 'SessionController::checkLogin');
		}

		//add new news snippet to database
		function post() {
			//update news snippet
			if( isset( $_POST['editId'] ) ){
				self::updateNewsSnippet();
			}
			//create news snippet
			else{
				self::createNewsSnippet();
		    }
		 
		}
		 
		//list all news snippets
		function get() {
			if( isset( $_GET['action'] ) && $_GET['action'] == 'addNews' ){
				$pageInfo['pageTitle'] = 'Add News';
				include( TEMPLATE_PATH . "/admin/addNews.php" );
			}
			else if( isset( $_GET['action'] ) && $_GET['action'] == 'edit' ){
				self::editNewsSnippet();
			}
			else if( isset( $_GET['action'] ) && $_GET['action'] == 'delete' ){
				self::deleteNewsSnippet();
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
		  	$pageInfo['pageTitle'] = "All News Snippets";
		  	include( TEMPLATE_PATH . "/admin/listNews.php" );
		}

		public function createNewsSnippet(){
		    	// get news snippet data from post array
			$newsData['title']    = $_POST['title'];
			$newsData['contents'] = $_POST['contents'];
			$newsData['link']     = $_POST['link'];
			$newsSnippet          = new News($newsData);

		    	if($newsSnippet->save()){
		    		//display success message and list all snippets
		    		$this->pageInformation['successMessage'] = 'News successfully added.';
		    		self::listNewsSnippets();
		    	}else{
		    		//display error message and go to add page
		    		$this->pageInformation['errorMessage'] = 'Unable to add news snippet.';
		    		include( TEMPLATE_PATH . '/admin/addNews.php' );
		    	}
		}

		public function updateNewsSnippet(){
			$newData['title']    = $_POST['title'];
			$newData['contents'] = $_POST['contents'];
			$newData['link']    = $_POST['link'];

			$newsSnippet = News::getById($_POST['editId']);
			if($newsSnippet->update($newData)){
				//success message and display all articles
				$this->pageInformation['successMessage'] = "News successfully updated";
				self::listNewsSnippets();
			}
			else{
				$this->pageInformation['errorMessage'] = 'Unable to update news snippet.';
				include( TEMPLATE_PATH . '/admin/editNews.php' );
			}
		}

		//display edit form and populate it with data
		public function editNewsSnippet(){
			//get id from $_GET array
			$newsId      = $_GET['newsId'];
			$newsSnippet = News::getById($newsId);

			$pageInfo['pageTitle'] = 'Edit Page';
			include( TEMPLATE_PATH . '/admin/editNews.php' );
		}

		//delete news article from db
		public function deleteNewsSnippet(){
			if(News::delete($_GET['newsId'])){
				$this->pageInformation['successMessage'] = 'News snippet successfully deleted';
			}
			else{
				$this->pageInformation['errorMessage'] = 'Unable to delete news snippet.';
			}
			self::listNewsSnippets();
		}
}

?>