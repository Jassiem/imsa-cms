<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
 
  <div id="adminHeader">
    <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
  </div>

  <h1>All People</h1>
 
  <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
    <div class="errorMessage"><?php echo $this->pageInformation['errorMessage'] ?></div>
  <?php } ?>
   
   
  <?php if ( isset( $this->pageInformation['successMessage'] ) ) { ?>
    <div class="successMessage"><?php echo $this->pageInformation['successMessage'] ?></div>
  <?php } ?>
 
  <table>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Title</th>
      <th>Area</th>
      <th>Email</th>
    </tr>
 
  <?php foreach ( $results['people'] as $person ) { ?>
 
    <tr>
      <td><?php echo $person->getFirstName(); ?></td>
      <td><?php echo $person->getLastName(); ?></td>
      <td><?php echo $person->getTitle(); ?></td>
      <td><?php echo $person->getArea(); ?></td>
      <td><?php echo $person->getEmail(); ?></td>
      <td>
        <a href="/person?action=edit&amp;personId=<?php echo $person->getId()?>"> Edit </a>
      </td>
      <td>
        <a href="/person?action=delete&amp;personId=<?php echo $person->getId()?>"> Delete </a>
      </td>
    </tr>
 
  <?php } ?>
 
  </table>
  <p><a href="/person?action=addPerson">Add a Person</a></p>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>