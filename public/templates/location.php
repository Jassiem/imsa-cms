<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>IMSA</title>
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/bootstrap/default/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/layout.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/side-navigation.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/location.css">
</head>

<body>
  <div class="wrapper">
    <!-- NAVIGATION -->
    <?php include(TEMPLATE_PATH . '/includes/navigation.php');?>

    <div class="row">
      <!--SIDE-NAVIGATION-->
      <?php include( TEMPLATE_PATH . '/includes/side-navigation.php' ); ?>

        <div class="col-md-8">
          <h2 class='brand-secondary'> Directions </h2>
          <p> We will get you a visitor parking pass.  There are a few visitor places next to the building which are most likely to be open, and you can park anywhere except handicapped with the pass.  The best way to do this is to call when you are close and someone will meet you in front of the building with the parking pass.  We are in McAdams hall, in the old part, room 221, in the most northwest corner of the building.  It is easiest to come in doors on the west side. </p>
          <h2 class='brand-secondary push-down'> Map </h2>
          <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=100+mcadams+hall+clemson,+sc&amp;aq=&amp;sll=34.683814,-82.816437&amp;sspn=0.067897,0.121708&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=McAdams+Hall,+Clemson,+South+Carolina+29631&amp;z=14&amp;ll=34.675402,-82.83461&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=100+mcadams+hall+clemson,+sc&amp;aq=&amp;sll=34.683814,-82.816437&amp;sspn=0.067897,0.121708&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=McAdams+Hall,+Clemson,+South+Carolina+29631&amp;z=14&amp;ll=34.675402,-82.83461" style="color:#0000FF;text-align:left">View Larger Map</a></small>       
        </div>
    </div>


  </div>

  <?php include(TEMPLATE_PATH . '/includes/footer.php'); ?>
</body>
</html>