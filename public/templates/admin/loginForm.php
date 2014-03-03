<?php include  TEMPLATE_PATH . '/includes/header.php' ?>
  <div class='row'>
    <div class='col-lg-3'></div>
    <div class='col-lg-6'>
      <form action="/login" method="post">
        <input type="hidden" name="login" value="true" />
     
        <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
          <span class="label label-danger"><?php echo $this->pageInformation['errorMessage'] ?></span>
        <?php } ?>

        <div class='well well-lg push-left'>
          <h2> Login </h2>

            <div class='form-group'>
              <span class='control-label input-group-addon' for="username">Username</span>
              <input type="text" name="username" id="username" placeholder="Your admin username" class='form-control' required autofocus maxlength="20" />
            </div>

            <div class='form-group'>
              <span class='input-group-addon control-label' for="password">Password</span>
              <input type="password" name="password" id="password" placeholder="Your admin password" class='form-control' required maxlength="20" />
            </div>

            <div class='buffer-20'> </div>

            <div class="btn-group">
              <button class='btn btn-primary' type='submit'>Submit</button>
            </div>
            <div class='pull-right'>
              <a href='/user?action=reset-user'> Forgot Password? </a>
            </div>

          </div>
      </form>
    </div>
    <div class='col-lg-3'></div>
  </div>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php') ?>