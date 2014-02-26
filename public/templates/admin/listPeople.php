<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>

  <h1>All People</h1>

  <div class='buffer-20'></div>
  <div class='buffer-20'></div>
 
  <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
    <span class="label label-danger"><?php echo $this->pageInformation['errorMessage'] ?></span>
  <?php } ?>
   
   
  <?php if ( isset( $this->pageInformation['successMessage'] ) ) { ?>
    <span class="label label-success"><?php echo $this->pageInformation['successMessage'] ?></span>
  <?php } ?>
 
  <div class="panel panel-default">
  <div class="panel-heading"><b>List of all people involved with IMSA.</b></div> 
    <table class ='table'>
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
          <a class='delete' href='/person?action=delete&amp;personId=<?php echo $person->getId()?>'> Delete </a>
        </td>
      </tr>
   
    <?php } ?>
   
    </table>
  </div>
  <a href='/person?action=addPerson'><button class='btn btn-primary'>Add a Person</button></a>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>