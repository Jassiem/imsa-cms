<?php include( TEMPLATE_PATH . '/includes/header.php' ); ?>
<div class='jumbotron'>
  <h1 style="text-align: center;"> IMSA Admin Home Page </h1>
  <p>  Through this portal you can edit the content that appears on the <a href='/home'>IMSA</a> website.  This content includes people, affiliates, spotlight information, and news articles.  Use the toolbar or the links below to get started.</p>
  <p>  If you have any questions please contact <a href='mailto: jassiem@clemson.edu'> Jassiem Moore </a>. </p>
</div>

<div class="row">
  <div class="col-lg-3">
    <h2>Affiliates</h2>
    <p>Add or edit new affiliates.  View current list of affiliates.</p>
    <p><a class="btn btn-default" href="/affiliates_admin" role="button">Go <span class='glyphicon glyphicon-circle-arrow-right'></span></a></p>
  </div>

  <div class="col-lg-3">
    <h2>News</h2>
    <p>Add, edit, and delete news articles.  View a list of all the current news articles.</p>
    <p><a class="btn btn-default" href="/news" role="button">Go <span class='glyphicon glyphicon-circle-arrow-right'></a></p>
  </div>

  <div class="col-lg-3">
    <h2>People</h2>
    <p>Add, edit, and delete people that are part of IMSA. View the current list of people.</p>
    <p><a class="btn btn-default" href="/person" role="button">Go <span class='glyphicon glyphicon-circle-arrow-right'></a></p>
  </div>

  <div class="col-lg-3">
    <h2>Spotlight</h2>
    <p>Add, edit, and delete spotlight information. View list of all spotlights.</p>
    <p><a class="btn btn-default" href="/spotlight" role="button">Go <span class='glyphicon glyphicon-circle-arrow-right'></a></p>
  </div>
</div>


<?php include ( TEMPLATE_PATH . '/includes/adminFooter.php'); ?>