<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>IMSA</title>
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/bootstrap/default/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/layout.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/side-navigation.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/people.css">
</head>

<body>
  <div class="wrapper">
    <!--NAVIGATION-->
    <?php include(TEMPLATE_PATH . '/includes/navigation.php');?>

    <div class="row">
      <!--SIDE-NAVIGATION-->
      <?php include( TEMPLATE_PATH . '/includes/side-navigation.php' ); ?>

      <div class="col-xs-8">
        <h2 class="participant-title brand-secondary"> People </h2>
        <div class="col-xs-6">

        <?php
        $counter = 0;
        foreach($people as $person) {
          if($counter % 2 == 0) {
        ?>

          <ul class="staff-list">
            <li> <?php echo $person->getFirstName() . ' ' . $person->getLastName() ?> </li>
            <li> <?php echo $person->getTitle() ?> </li>
            <li> <i> <?php echo $person->getArea()?> </i> </li>
            <li> <a href="mailto:<?php echo $person->getEmail() ?>"> <?php echo $person->getEmail() ?> </a> </li>
          </ul>
        </div>
        <div class="col-xs-6">

          <?php } else { ?>

          <ul class="staff-list">
            <li> <?php echo $person->getFirstName() . ' ' . $person->getLastName() ?> </li>
            <li> <?php echo $person->getTitle() ?> </li>
            <li> <i> <?php echo $person->getArea()?> </i> </li>
            <li> <a href="mailto:<?php echo $person->getEmail() ?>"> <?php echo $person->getEmail() ?> </a> </li>
          </ul>
          <?php } }?>
        </div>
      </div>

    </div>

  </div>

  <?php include(TEMPLATE_PATH . '/includes/footer.php'); ?>
</body>
</html>