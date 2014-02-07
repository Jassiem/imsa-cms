<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
 
  <div id="adminHeader">
    <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
  </div>

  <h1>All News</h1>
 
  <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
    <div class="errorMessage"><?php echo $this->pageInformation['errorMessage'] ?></div>
  <?php } ?>
 
 
  <?php if ( isset( $this->pageInformation['successMessage'] ) ) { ?>
    <div class="successMessage"><?php echo $this->pageInformation['successMessage'] ?></div>
  <?php } ?>
 
  <table>
    <tr>
      <th>Title</th>
      <th>Contents</th>
    </tr>
 
  <?php foreach ( $results['news'] as $newsSnippet ) { ?>
 
    <tr>
      <td><?php echo $newsSnippet->getTitle(); ?></td>
      <td>
        <?php echo $newsSnippet->getContents(); ?>
      </td>
      <td>
        <a href="/news?action=edit&amp;newsId=<?php echo $newsSnippet->getId()?>"> Edit </a>
      </td>
      <td>
        <a href="/news?action=delete&amp;newsId=<?php echo $newsSnippet->getId()?>"> Delete </a>
      </td>
    </tr>
 
  <?php } ?>
 
  </table>
  <p><a href="/news?action=addNews">Add a News Snippet</a></p>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>