<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
 
  <form action='/affiliates_admin' method='post' id='addAffiliateForm' style="width: 50%;">
 
    <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
      <div class='errorMessage'><?php echo $this->pageInformation['errorMessage'] ?></div>
    <?php } ?>
    <ul>

      <li>
        <label for='company_name'>Company Name</label>
        <input type='text' name='company_name' id='company_name' placeholder='Enter company name' required autofocus maxlength="40" />
      </li>

    </ul>

    <div class='buttons'>
      <input type='submit' name='addNews' value='Submit' />
    </div>

</form>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>