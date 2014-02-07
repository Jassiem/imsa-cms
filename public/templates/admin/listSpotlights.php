<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
 
  <div id="adminHeader">
    <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
  </div>

  <h1>All Spotlights</h1>
 
  <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
    <div class="errorMessage"><?php echo $this->pageInformation['errorMessage'] ?></div>
  <?php } ?>
 
 
  <?php if ( isset( $this->pageInformation['successMessage'] ) ) { ?>
    <div class="successMessage"><?php echo $this->pageInformation['successMessage'] ?></div>
  <?php } ?>
 
  <table>
    <tr>
      <th>Image Name</th>
      <th>Description</th>
      <th>Info Link </th>
    </tr>
 
  <?php foreach ( $results['spotlights'] as $spotlight ) { ?>
 
    <tr>
      <td><?php echo $spotlight->getImageName(); ?></td>
      <td>
        <?php echo $spotlight->getDescription(); ?>
      </td>
      <td>
        <?php echo $spotlight->getInfoLink(); ?>
      </td>
      <td>
        <a href="/spotlight?action=edit&amp;spotlightId=<?php echo $spotlight->getId()?>"> Edit </a>
      </td>
      <td>
        <a href="/spotlight?action=delete&amp;spotlightId=<?php echo $spotlight->getId()?>"> Delete </a>
      </td>
    </tr>
 
  <?php } ?>
 
  </table>
  <p><a href="/spotlight?action=addSpotlight">Add a Spotlight</a></p>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>