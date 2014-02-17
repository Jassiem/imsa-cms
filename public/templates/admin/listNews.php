<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>

  <h1>All News</h1>

  <div class='buffer-20'></div>
  <div class='buffer-20'></div>
 
  <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
    <span class="label label-danger"><?php echo $this->pageInformation['errorMessage'] ?></span>
  <?php } ?>
 
 
  <?php if ( isset( $this->pageInformation['successMessage'] ) ) { ?>
    <span class="label label-success"><?php echo $this->pageInformation['successMessage'] ?></span>
  <?php } ?>

  <div class="panel panel-default">
  <div class="panel-heading"><b>List of all news articles.</b></div> 
    <table class='table'>
      <tr>
        <th>Title</th>
        <th>Contents</th>
        <th>Link</th>
      </tr>
   
    <?php foreach ( $results['news'] as $newsSnippet ) { ?>
   
      <tr>
        <td> <?php echo $newsSnippet->getTitle(); ?> </td>
        <td> <?php echo $newsSnippet->getContents(); ?> </td>
        <td> <?php echo $newsSnippet->getLink(); ?> </td>
        <td>
          <a href="/news?action=edit&amp;newsId=<?php echo $newsSnippet->getId()?>"> Edit </a>
        </td>
        <td>
          <a href="/news?action=delete&amp;newsId=<?php echo $newsSnippet->getId()?>"> Delete </a>
        </td>
      </tr>
   
    <?php } ?>
   
    </table>
  </div>
  <a href='/news?action=addNews'><button class='btn btn-primary'>Add a News Snippet</button></a>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>