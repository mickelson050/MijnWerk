<!DOCTYPE html>
<html>
<head>
	<title>Menulijst</title>
	<?php include 'includes/header.inc.php';
		session_start(); 

		$id = $_GET['business']; 
		$_SESSION['get_id'] = $id; 
	?>
</head>
<body>

	<?php 
		  include 'includes/nav.inc.php'; 
		  include 'includes/functions.inc.php';
		  include 'includes/dbh.inc.php';
	?>

	<div id="wrap"> <!-- Begin page-wrap -->
		<div id="main" class="container"> <!-- Begin container -->

			<?php
			$id = null;
			
			if (isset($_GET['business']) && is_numeric($_GET['business'])) {
				$id = mysqli_real_escape_string($conn, $_GET['business']);
			}
			
			?>
			<?php  ?>
			<h2>Voorgerechten</h2>

			<hr />

	  		<?php gerechten($id, "voorgerecht"); ?>	

	  		<h2>Hoofdgerechten</h2>
	  		
	  		<hr />

	  		<?php gerechten($id, "hoofdgerecht"); ?>
			
			<h2>Nagerechten</h2>

			<hr />
	  			

	  		<?php gerechten($id, "nagerecht");?>	


	  		<div class="row">
				<div class="col-lg-12">
				    <div class="form-group">
					    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#cart">Bekijk winkelmandje</button>
				    </div>
				</div>
			</div>

	  			

		</div> <!-- Einde div container -->
	</div> <!-- Einde div wrap -->

	<!-- Winkelmand Modal -->
	<div id="cart" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Winkelmandje</h4>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	        	<div class="col-lg-12">
	        	<form method="POST" action="afrekenen.php">
	        		<table class="table">
					    <thead>
					      <tr>
					        <th>Product</th>
					        <th>Aantal</th>
					        <th>Prijs p/s</th>
					        <th>Totaal prijs</th>
					        <th>Actie</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <?php cart(); ?>
					      </tr>
					    </tbody>
					  </table>
					  <strong>Totaal: </strong> &euro; <?php number_format((float)getTotal(), 2, '.', '') ?>
					  
					  <?php
					  $subTotal = $total;
				 	  $_SESSION['get_total'] = $subTotal; 
				 	 ?>
				 	 
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	      	<?php if($total > 0) { ?>
	      	<button type="submit" class="btn btn-success">Afrekenen</button>
	      	<?php } ?>
	      </form>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
	      </div>
	    </div>

	  </div>
	</div>

</body>
</html>