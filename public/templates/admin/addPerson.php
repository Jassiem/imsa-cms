<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
  <div class='row'>
    <div class='col-lg-3'></div>
    <div class='col-lg-6'>
    <form action="/person" method="post" id='addPersonForm'>
   
      <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
        <span class="label label-danger"><?php echo $this->pageInformation['errorMessage'] ?></span>
      <?php } ?>
      
      <div class='well well-lg push-left'>
        <h2> Add Person </h2>

        <div class='buffer-20'></div>
        <div class='buffer-20'></div>

        <div class='form-group'>
          <span class='input-group-addon control-label' for="first_name">First Name</span>
          <input class='form-control' type="text" name="first_name" id="first_name" placeholder="Enter first name" required autofocus pattern="[A-Z][a-z]+" maxlength="20" />
        </div>

        <div class='form-group'>
          <span class='input-group-addon control-label' for="last_name">Last Name</span>
          <input class='form-control' type="text" name="last_name" id="last_name" placeholder="Enter last name" required autofocus pattern="[A-Z][a-z]+" maxlength="20" />
        </div>

        <div class='form-group'>
          <span class='input-group-addon control-label' for="title">Title</span>
          <input class='form-control' type="text" name="title" id="title" placeholder="Enter title" required autofocus maxlength="20" />
        </div>

        <div class='form-group'>
          <span class='input-group-addon control-label' for="area">Area</span>
          <input class='form-control' type="text" name="area" id="area" placeholder="Enter area" required autofocus maxlength="20" />
        </div>

        <div class='form-group'>
          <span class='input-group-addon control-label' for='email'>Email</span>
          <input class='form-control' type='email' name='email' id='email' placeholder="Enter email" required maxlength="30"/>
        </div>

        <div class='buttons'>
          <button class='btn btn-primary' type="submit" name="addPerson"> Submit </button>
        </div>

      </div>

    </form>
    </div>
    <div class='col-lg-3'></div>
  </div>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>