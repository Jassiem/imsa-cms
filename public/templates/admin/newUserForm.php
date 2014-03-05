<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
  <div class='row'>
    <div class='col-xs-3'></div>
    <div class='col-xs-6'>
   
    <form action="/user" method="post">
      <input type="hidden" name="newUser" value="true" />

      <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
        <span class="span span-danger"><?php echo $this->pageInformation['errorMessage'] ?></span>
      <?php } ?>

      <div class='well well-lg push-left'>
        <h2> Add Administrative User </h2>

        <div class='buffer-20'></div>
        <div class='buffer-20'></div>

        <div class='form-group'>
          <span class='input-group-addon control-label' for="username">Username</span>
          <input class='form-control' type="text" name="username" id="username" placeholder="Your admin username" required autofocus maxlength="20" />
        </div>

        <div class='form-group'>
          <span class='input-group-addon control-label' for="email">Email</span>
          <input class='form-control' type="email" name="email" id="email" placeholder="Your email address" required/>
        </div>

        <div class='form-group'>
          <span class='input-group-addon control-label' for="password">Password</span>
          <input class='form-control' type="password" name="password" id="password" placeholder="Your admin password" required maxlength="64" />
        </div>

        <div class='form-group'>
          <span class='input-group-addon control-label' for="confirm_password"> Confirm Password</span>
          <input class='form-control' type="password" name="confirm_password" id="confirm_password" placeholder="Please confirm password" required maxlength="64"/>
        </div>

        <div class="buttons">
          <button class='btn btn-primary' type="submit" name="newUser">Submit </button>
        </div>
      </div>

    </form>
    </div>
    <div class='col-xs-3'></div>
  </div>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>