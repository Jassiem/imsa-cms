<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
<div class='row'>
  <div class='col-lg-3'></div>
  <div class='col-lg-6'>
    <form action='/affiliates_admin' method='post' id='addAffiliateForm'>
   
      <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
        <span class="label label-danger"><?php echo $this->pageInformation['errorMessage'] ?></span>
      <?php } ?>

      <div class='well well-lg push-left'>
        <h2> Add Affiliate </h2>

        <div class='buffer-20'></div>
        <div class='buffer-20'></div>

        <div class='form-group'>
          <span class='input-group-addon control-label' for='company_name'>Company Name</span>
          <input class='form-control' type='text' name='company_name' id='company_name' placeholder='Enter company name' required autofocus maxlength="40" />
        </div>
        <div class='buttons'>
          <button class='btn btn-primary' type='submit' name='addAffiliate'> Submit </button>
        </div>
      </div>

  </form>
  </div>
</div>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>