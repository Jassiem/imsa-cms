<?php 
	require_once ( "models/News.php" );

	class NewsController{
		function newNewsSnippet() {
		  	$results = array();
		  	$results['pageTitle'] = "New Article";
		  	$results['formAction'] = "newArticle";
		 
		 	if ( isset( $_POST['saveChanges'] ) ) {
		 
		    	// User has posted the article edit form: save the new article
		    	$article = new Article;
		    	$article->storeFormValues( $_POST );
		    	$article->insert();
		    	header( "Location: admin.php?status=changesSaved" );
		 
		  	} elseif ( isset( $_POST['cancel'] ) ) {
		 
		    	// User has cancelled their edits: return to the article list
		    	header( "Location: admin.php" );
		  	} else {
		 
		    	// User has not posted the article edit form yet: display the form
		    	$results['article'] = new Article;
		    	require( TEMPLATE_PATH . "/admin/editArticle.php" );
		  }
		 
		}
		 
		 
		function editNewsSnippet() {
		  	$results = array();
		  	$results['pageTitle'] = "Edit News Snippet";
		  	$results['formAction'] = "editNews";
		 
		  	if ( isset( $_POST['saveChanges'] ) ) {
		 
		    	// User has posted the article edit form: save the article changes
		 
		    	if ( !$news = News::getById( (int)$_POST['newsId'] ) ) {
		      		header( "Location: admin.php?error=newsSnipetNotFound" );
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
		 
		function deleteNewsSnippet() {
		  	if ( !$article = Article::getById( (int)$_GET['articleId'] ) ) {
		    	header( "Location: admin.php?error=articleNotFound" );
		    	return;
		  	}
		 
		  	$article->delete();
		  	header( "Location: admin.php?status=articleDeleted" );
		}
		 
		function listNewsSnippets() {
		  	$results = array();
		  	$data = News::getList();
		  	$results['news'] = $data['results'];

		 	// $results['totalRows'] = $data['totalRows'];
		  	$results['pageTitle'] = "All News Snippets";
		 
		  	if ( isset( $_GET['error'] ) ) {
		    	if ( $_GET['error'] == "newsNotFound" ) $results['errorMessage'] = "Error: News not found.";
		  	}
		 
		  	if ( isset( $_GET['status'] ) ) {
		    	if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
		    	if ( $_GET['status'] == "newsDeleted" ) $results['statusMessage'] = "News snippet deleted.";
		  	}
		 
		  	require( TEMPLATE_PATH . "/admin/listArticles.php" );
		}
}

?>