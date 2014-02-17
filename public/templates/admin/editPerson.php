<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
 <div class='row'>
   <div class='col-lg-3'></div>
   <div class='col-lg-6'>
    <form action="/person" method="post" id='editPersonForm'>
      <input type="hidden" name="editId" id='editId' value="<?php echo $person->getId()?>" />
   
      <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
        <span class="label label-danger"><?php echo $this->pageInformation['errorMessage'] ?></span>
      <?php } ?>

      <div class='well well-lg push-left'>
        <h2> Edit Person </h2>

        <div class='buffer-20'></div>
        <div class='buffer-20'></div>

        <div class='form-group'>
          <span class='input-group-addon control-label' for="first_name">First Name: <?php echo $person->getFirstName() ?></span>
        </div>

        <div class='form-group'>
          <span class='input-group-addon control-label' for="last_name">Last Name: <?php echo $person->getLastName() ?></span>
        </div>

        <div class='form-group'>
          <span class ='input-group-addon control-label' for="title">Title</span>
          <input class='form-control' type="text" name="title" id="title" value="<?php echo $person->getTitle() ?>" required autofocus maxlength="20" />
        </div>

        <div class='form-group'>
          <span class ='input-group-addon control-label' for="area">Area</span>
          <input class='form-control' type="text" name="area" id="area" value="<?php echo $person->getArea() ?>" required autofocus maxlength="20" />
        </div>

        <div class='form-group'>
          <span class ='input-group-addon control-label' for='email'>Email</span>
          <input class='form-control' type-'email' name='email' id='email' form='addPersonForm' value="<?php echo $person->getEmail() ?>" required maxlength="30"/>
        </div>

        <div class="buttons">
          <button class='btn btn-primary' type="submit" name="editPerson"> Submit </button>
        </div>

      </div>

    </form>
    </div>
    <div class='col-lg-3'></div>
  </div>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>