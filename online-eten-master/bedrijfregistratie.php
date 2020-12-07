<?php 
	include 'includes/header.inc.php';
	include 'includes/nav.inc.php';
if (!isset($_SESSION['user_id'])) {
	header("Location: index.php");
	exit();
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	

</head>
<body>

	

	<div id="wrap"> <!-- Begin page-wrap -->
		<div id="main" class="container"> <!-- Begin container -->

			<h1 style="color: #337ab7;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Registreren bedrijf</h1>

			<hr>
			<?php
			 if (strpos($url,'success')) {
	            echo '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Gelukt!</strong> <br /> De registratie is gelukt. Uw bedrijf is nu toegevoegd aan de website!
                    </div>';
	        }
	          ?>


<form method="POST" action="includes/register-business.inc.php">
						
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
					    <label for="bedrijfsnaam">Naam bedrijf: </label>
					    <input class="form-control" name="bedrijfsnaam">
				    </div>
			  	</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
					    <label for="phonenumber">Telefoon nummer:</label>
					    <input class="form-control" name="phonenumber" placeholder="0612345678">
				    </div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
				    <div class="form-group">
					    <label for="address">Straat naam: </label>
					    <input class="form-control" name="address" placeholder="groningerweg">

				    </div>
				</div>

				<div class="col-lg-2">
				    <div class="form-group">
					    <label for="address">Huisnummer:</label>
					    <input class="form-control" name="address1" placeholder="11">
				    </div>
				</div>

				<div class="col-lg-2">
				    <div class="form-group">
					    <label for="address">Toevoeging:</label>
					    <input class="form-control" name="address2" placeholder="A">
				    </div>
				</div>

				<div class="col-lg-2">
				    <div class="form-group">
					    <label for="zipcode">Postcode: </label>
					    <input class="form-control" name="zipcode" placeholder="7325 EX">
				    </div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
				    <div class="form-group">
					    <label for="plaatsnaam">Plaatsnaam: </label>
					    <input class="form-control" name="plaatsnaam" placeholder="Groningen">
				    </div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<label for="bedrijfscode">Bedrijfscode: </label>
						<input type="$bedrijfscode" class="form-control" name="bedrijfscode">
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-lg-12">
				    <div class="form-group">
					    <button type="submit" name="submit" class="btn btn-primary">Registreren</button>
				    </div>
				</div>
			</div>

		</form> <!-- Einde registratie form -->

		</div> <!-- Einde div container -->
	</div> <!-- Einde div wrap -->

</body>
</html>