<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>

  <h1>All Affiliates</h1>

  <div class='buffer-20'></div>
  <div class='buffer-20'></div>
 
  <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
    <span class="label label-danger"><?php echo $this->pageInformation['errorMessage'] ?></span>
  <?php } ?>
 
 
  <?php if ( isset( $this->pageInformation['successMessage'] ) ) { ?>
    <span class="label label-success"><?php echo $this->pageInformation['successMessage'] ?></span>
  <?php } ?>
 
  <div class="panel panel-default">
  <div class="panel-heading"><b>List of all affiliates working with IMSA.</b></div> 
    <table class='table'>
      <tr>
        <th>Company Name</th>
      </tr>
   
    <?php foreach ( $results['affiliates'] as $affiliate ) { ?>
   
      <tr>
        <td> <?php echo $affiliate->getCompanyName(); ?> </td>
        <td>
          <a class='delete' href="/affiliates_admin?action=delete&amp;affiliateId=<?php echo $affiliate->getId()?>"> Delete </a>
        </td>
      </tr>
   
    <?php } ?>
   
  </table>
  </div>
  <a href="/affiliates_admin?action=addAffiliate"><button class='btn btn-primary'>Add an Affiliate</button></a>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>