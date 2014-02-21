<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>IMSA</title>
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/bootstrap/default/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/layout.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>/css/index.css">
</head>

<body>
  <div class="wrapper">
    <!--NAVIGATION-->
    <?php include(TEMPLATE_PATH . '/includes/navigation.php');?>

    <div class='row'>
      <div class='col-lg-3'>
        <h2 class='list-group-heading'>Quick Links</h2>
        <div class='full-width-line'></div>
        <div class="list-group quick-links">
          <a class="list-group-item" href="/location"> <span class="glyphicon glyphicon-flash"></span>Location</a>
          <a class="list-group-item" href="/people"> <span class="glyphicon glyphicon-flash"></span>People</a>
        </div>
      </div>

      <div class='col-lg-4'>
      <h2 class='list-group-heading'>Latest News</h2>
        <div class="list-group">
          <?php foreach($newsItems as $newsItem) {?>
            <a class='list-group-item' href="<?php echo $newsItem->getLink() ?>"> <?php echo $newsItem->getContents(); ?> </a>
          <?php } ?>
        </div>
      </div>

      <div class='col-lg-5'>
        <h2 class='list-group-heading'>Spotlight</h2>
        <div class="list-group">
          <a class='list-group-item' href="<?php echo $spotlight->getInfoLink(); ?>"> <img class="spotlight-image" src="<?php echo ASSET_PATH;?>/images/<?php echo $spotlight->getImageName(); ?>"> </a></li>
          <li class='list-group-item'> <?php echo $spotlight->getDescription(); ?></a>
        </div>
      </div>
    </div>

    <div class='row'>
      <div class='col-lg-7'>
        <h2 class="list-group-heading"> Welcome to IMSA </h2>
        <div class='full-width-line'></div>
        <div class="jumbotron">
          <div class="center-justified">
            <p>IMSA areas of expertise include Modeling, Systems, Analytics, and Visualization.</p>   

            <p>IMSA is a nationally competitive scientific research institute that brings together academic partners, industry partners, and federal and state agencies with the cohesive mission of furthering research in visual and decision informatics.  IMSA serves to drive continuous innovation through knowledge sharing among partners leading to invention and commercialization of decision support technologies.</p>

            <p>IMSA provides expertise for advanced modeling using simulation and statistical techniques together with advanced visualization methods, tools, and technologies.  IMSA visualization augments research capability across a wide range of domain problems. </p>

            <p>IMSA is a Commission on Higher Education state-approved institute of South Carolina and reports to the Vice President for Research of Clemson University. </p>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <h2 class="list-group-heading"> Sponsors </h2>
        <div class="sponsor-div">
          <a class=""><img src="<?php echo ASSET_PATH;?>/images/nsf1.gif" alt="NSF Logo">
        </div>
      </div>
    </div>

  </div> <!-- WRAPPER -->

  <!--FOOTER-->
  <?php include(TEMPLATE_PATH . '/includes/footer.php'); ?>