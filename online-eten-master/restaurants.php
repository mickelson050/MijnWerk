<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'includes/header.inc.php'; ?>
	
</head>
<body>

	<?php 
	include 'includes/nav.inc.php'; 
	include 'includes/functions.inc.php';
	?>
	
	<div id="wrap"> <!-- Begin page-wrap -->
		<div id="main" class="container"> <!-- Begin container -->

		  	<h1 style="text-align: center; margin-bottom: 10px;">Restaurants in 
		  		<?php 
					stad($_GET["input-location"]); 		
		  		?></h1>
		  	
		  	<hr />

			<?php 
				
					restaurants($_GET["input-location"]);
				
			?>
		


		</div> <!-- Einde div container -->
	</div> <!-- Einde div wrap -->

	<?php include 'includes/unset_shoppingcart.inc.php'; ?>
	
</body>
</html>
