<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
 
  <form action="/person" method="post" id='editPersonForm' style="width: 50%;">
    <input type="hidden" name="editId" id='editId' value="<?php echo $person->getId()?>" />
 
    <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
      <div class="errorMessage"><?php echo $this->pageInformation['errorMessage'] ?></div>
    <?php } ?>
    <ul>

      <li>
        <label for="first_name">First Name: <?php echo $person->getFirstName() ?></label>
      </li>

      <li>
        <label for="last_name">Last Name: <?php echo $person->getLastName() ?></label>
      </li>

      <li>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?php echo $person->getTitle() ?>" required autofocus maxlength="20" />
      </li>

      <li>
        <label for="area">Area</label>
        <input type="text" name="area" id="area" value="<?php echo $person->getArea() ?>" required autofocus maxlength="20" />
      </li>

      <li>
        <label for='email'>Email</label>
        <input type-'email' name='email' id='email' form='addPersonForm' value="<?php echo $person->getEmail() ?>" required maxlength="30"/>
      </li>

    </ul>

    <div class="buttons">
      <input type="submit" name="editPerson" value="Submit" />
    </div>

  </form>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>