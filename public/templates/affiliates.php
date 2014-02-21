<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>IMSA</title>
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/bootstrap/default/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/layout.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/side-navigation.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/affiliates.css">
</head>

<body>
  <div class="wrapper">
    <!--NAVIGATION-->
    <?php include(TEMPLATE_PATH . '/includes/navigation.php');?>

    <div class='row'>
    <!--SIDE-NAVIGATION-->
    <?php include(TEMPLATE_PATH . '/includes/side-navigation.php'); ?>

      <div class="col-md-8">
        <h2 class="participant-title"> Affiliates </h2>
        <div class="col-md-6">

        <?php
        $counter = 0;
        foreach($affiliates as $affiliate) {
          if($counter % 2 == 0) {
        ?>

          <ul class="staff-list">
            <li> <?php echo $affiliate->getCompanyName() ?> </li>
          </ul>
        </div>
        <div class="col-md-6">

          <?php } else { ?>

          <ul class="staff-list">
            <li> <?php echo $affiliate->getCompanyName() ?> </li>
          </ul>
          <?php } }?>
        </div>
      </div>
    </div>

    </div>

  </div>

  <?php include(TEMPLATE_PATH . '/includes/footer.php'); ?>
</body>
</html>