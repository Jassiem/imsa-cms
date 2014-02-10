<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
 
  <div id="adminHeader">
    <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
  </div>

  <h1>All Affiliates</h1>
 
  <?php if ( isset( $this->pageInformation['errorMessage'] ) ) { ?>
    <div class="errorMessage"><?php echo $this->pageInformation['errorMessage'] ?></div>
  <?php } ?>
 
 
  <?php if ( isset( $this->pageInformation['successMessage'] ) ) { ?>
    <div class="successMessage"><?php echo $this->pageInformation['successMessage'] ?></div>
  <?php } ?>
 
  <table>
    <tr>
      <th>Company Name</th>
    </tr>
 
  <?php foreach ( $results['affiliates'] as $affiliate ) { ?>
 
    <tr>
      <td> <?php echo $affiliate->getCompanyName(); ?> </td>
      <td>
        <a href="/affiliates_admin?action=delete&amp;affiliateId=<?php echo $affiliate->getId()?>"> Delete </a>
      </td>
    </tr>
 
  <?php } ?>
 
  </table>
  <p><a href="/affiliates_admin?action=addAffiliate">Add an Affiliate</a></p>
 
<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>