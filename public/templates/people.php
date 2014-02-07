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
			<!--SIDE-NAVIGATION-->
			<?php include( TEMPLATE_PATH . '/includes/side-navigation.php' ); ?>

			<div class="col-md-8">
				<h2 class="participant-title"> People </h2>
				<div class="col-md-6">
					<ul class="staff-list">
						<li> Amy Apon </li>
						<li> Director of IMSA </li>
						<li> <i>Big Data Systems Lab</i> </li>
						<li> <a href="mailto:aapon@clemson.edu" title="Send email to Amy Apon &gt;">aapon@clemson.edu</a> </li>
					</ul>
				</div>
				<div class="col-md-6">
					<ul class="staff-list">
						<li> Jassiem Moore </li>
						<li> Student Developer </li>
						<li> <i> Big Data Systems Lab</i> </li>
						<li> <a href="mailto:jassiem@clemson.edu" title="Send email to Jassiem Moore &gt;">jassiem@clemson.edu</a> </li>
					</ul>
				</div>
			</div>

		</div>

	</div>

	<?php include(TEMPLATE_PATH . '/includes/footer.php'); ?>
</body>
</html>