<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>

  <h1>All Spotlights</h1>

  <div class='buffer-20'></div>
  <div class='buffe-20'></div>
 
  <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
    <span class="label label-danger"><?php echo $this->pageInformation['errorMessage'] ?></span>
  <?php } ?>
 
 
  <?php if ( isset( $this->pageInformation['successMessage'] ) ) { ?>
    <span class="label label-success"><?php echo $this->pageInformation['successMessage'] ?></span>
  <?php } ?>
 
  <div class="panel panel-default">
  <div class="panel-heading"><b>List of all spotlight content.</b></div> 
    <table class='table'>
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
          <a class='delete' href="/spotlight?action=delete&amp;spotlightId=<?php echo $spotlight->getId()?>"> Delete </a>
        </td>
      </tr>
   
    <?php } ?>
   
    </table>
  </div>
  <a href='/spotlight?action=addSpotlight'><button class='btn btn-primary'>Add a Spotlight</button></a>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>