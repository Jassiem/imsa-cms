<?php include "templates/includes/header.php" ?>
 
  <div id="adminHeader">
    <h2>News Admin</h2>
    <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
  </div>

  <h1>All Articles</h1>
 
<?php if ( isset( $results['errorMessage'] ) ) { ?>
  <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
 
<?php if ( isset( $results['statusMessage'] ) ) { ?>
  <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>
 
  <table>
    <tr>
      <th>Title</th>
      <th>Contents</th>
    </tr>
 
<?php foreach ( $results['news'] as $newsSnippet ) { ?>
 
  <tr onclick="location='admin.php?action=editNewsSnippet&amp;newsId=<?php echo $newsSnippet->getId()?>'">
    <td><?php echo $newsSnippet->getTitle(); ?></td>
    <td>
      <?php echo $newsSnippet->getContents(); ?>
    </td>
  </tr>
 
<?php } ?>
 
  </table>
  <p><a href="admin.php?action=newArticle">Add a New Article</a></p>
 
<?php include "templates/includes/footer.php" ?>