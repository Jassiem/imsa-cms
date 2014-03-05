<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IMSA</title>
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/bootstrap/default/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/layout.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/side-navigation.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/affiliates.css">
  <script src="<?php echo ASSET_PATH;?>/js/respond.min.js"></script>
</head>

<body>
  <div class="wrapper">
    <!--NAVIGATION-->
    <?php include(TEMPLATE_PATH . '/includes/navigation.php');?>

    <div class='row'>
    <!--SIDE-NAVIGATION-->
    <?php include(TEMPLATE_PATH . '/includes/side-navigation.php'); ?>

      <div class="col-xs-8">
        <h2 class="participant-title brand-secondary"> Affiliates </h2>
        <div class="col-xs-6">

        <?php
        $counter = 0;
        foreach($affiliates as $affiliate) {
          if($counter % 2 == 0) {
        ?>

          <ul class="staff-list">
            <li> <?php echo $affiliate->getCompanyName() ?> </li>
          </ul>
        </div>
        <div class="col-xs-6">

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