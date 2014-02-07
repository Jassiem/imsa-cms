<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>IMSA</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/layout.css">
	<link rel="stylesheet" type="text/css" href="../css/side-navigation.css">
	<link rel="stylesheet" type="text/css" href="../css/people.css">
</head>

<body>
	<div class="wrapper">
		<!--NAVIGATION-->
		<?php include(TEMPLATE_PATH . '/includes/navigation.php');?>

		<div class="row">
			<div class="col-md-4">
				<div class="quick-links">
					<h2> Navigation </h2>
					<ul>
						<li> <a href="home.php"> Home </a> </li>
						<li> <a href="people.php"> People </a> </li>
					</ul>
				</div>
				<div class="general-info">
					<h2> General Information </h2>
					<ul>
						<li> some info </li>
						<li> some info </li>
				</div>
			</div>

			<div class="col-md-8">
				<h2 class="participant-title"> Companies </h2>
				<div class="col-md-6">
					<ul class="staff-list">
						<li> BMW </li>
						<li> Institue of Computing Ecology </li>
					</ul>
				</div>
				<div class="col-md-6">
					<ul class="staff-list">
						<li> Another Company </li>
					</ul>
				</div>
			</div>

		</div>

	</div>

	<?php include(TEMPLATE_PATH . '/includes/footer.php'); ?>
</body>
</html>