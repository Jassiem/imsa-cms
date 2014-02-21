<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo htmlspecialchars( $pageInfo['pageTitle'] )?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH ?>/bootstrap/admin/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH ?>/css/admin_header.css" />
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
    
      <div class="navbar-header">
        <a class="navbar-brand" href="/admin">IMSA CMS</a>
      </div>

      <ul class="nav navbar-nav">
        <li><a href="/user">Users</a></li>
        <li><a href='/affiliates_admin'>Affiliates</a></li>
        <li><a href="/news">News</a></li>
        <li><a href="/person">People</a></li>
        <li><a href="/spotlight">Spotlight</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <?php if( isset( $_SESSION['username'] ) ) {?>
          <li class='nav-list-item'> Hello, <?php echo $_SESSION['username'] ?></li>
        <?php }?>
        <li><a href="/logout?action=logout">Logout</a></li>
      </ul>

    </nav>
    <div class="container">
