<?php include "templates/includes/header.php" ?>
 
  <form action="/person" method="post" id='addPersonForm' style="width: 50%;">
 
<?php if ( isset( $this->results['errorMessage'] ) ) { ?>
  <div class="errorMessage"><?php echo $this->results['errorMessage'] ?></div>
<?php } ?>
  <ul>

    <li>
      <label for="first_name">First Name</label>
      <input type="text" name="first_name" id="first_name" placeholder="Enter first name" required autofocus maxlength="20" />
    </li>

    <li>
      <label for="last_name">Last Name</label>
      <input type="text" name="last_name" id="last_name" placeholder="Enter last name" required autofocus maxlength="20" />
    </li>

    <li>
      <label for="title">Title</label>
      <input type="text" name="title" id="title" placeholder="title" required autofocus maxlength="20" />
    </li>

    <li>
      <label for="area">Area</label>
      <input type="text" name="area" id="area" placeholder="Area" required autofocus maxlength="20" />
    </li>

    <li>
      <label for='email'>Email</label>
      <input type='email' name='email' id='email' placeholder="Enter email" required maxlength="30"/>
    </li>

  </ul>

  <div class='buttons'>
    <input type="submit" name="addPerson" value="Submit" />
  </div>

</form>
 
<?php include "templates/includes/adminFooter.php" ?>