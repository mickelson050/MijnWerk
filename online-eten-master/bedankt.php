<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'includes/header.inc.php'; 
		  $ordernumber = $_GET['ordernumber']; ?>
</head>
<body>

	<?php include 'includes/nav.inc.php'; ?>

	<div id="wrap"> <!-- Begin page-wrap -->
		<div id="main" class="container"> <!-- Begin container -->
			<div class="row" style="text-align: center;">
				<div class="col-lg-12">
					<h1 align="center">Bedankt!</h1>
						<hr />
							<h3 align="center">Uw ordernummer is: #<?php echo $ordernumber ?></h3> 
							<br/>
							<h4 align="center">De bestelling zal zo snel mogelijk verwerkt worden.</h4>
							<h4 align="center">Binnen c.a. 60 minuten zal u uw bestelling ontvangen!</h4>
							<br/>
							<img src="assets/img/duimpje.jpg" width="200px" height="200px">
						</div>
					</div>

		</div> <!-- Einde div container -->
	</div> <!-- Einde div wrap -->

	<?php
		  include 'includes/unset_shoppingcart.inc.php'?>



</body>
</html>