<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	include 'includes/header.inc.php'; ?>
</head>
<body>

	<?php include 'includes/nav.inc.php'; ?>

	<div id="wrap"> <!-- Begin page-wrap -->
		<div id="main" class="container"> <!-- Begin container -->

			<h1 style="color: #337ab7;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Registreren</h1>

			<hr />

			<?php 

			if (strpos($url,'empty')) {
	            echo '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Het registreren is niet gelukt..</strong> <br /> Er mogen geen velden leeggelaten worden.
                    </div>';
	        }
	        if (strpos($url,'usertaken')) {
	            echo '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Het registreren is niet gelukt..</strong> <br /> Er bestaat al een account met dit email-adres.
                    </div>';
	        }
	        if (strpos($url,'success')) {
	            echo '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Gelukt!</strong> <br /> De registratie is gelukt. U kunt nu inloggen!
                    </div>';
	        }

			?>

			<form method="POST" action="includes/register.inc.php"> <!-- Begin registratie form -->
			
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
					    <label for="email-address">Email-adres: *</label>
					    <input type="email" class="form-control" name="email_address" id="email_address" required>
				    </div>
			  	</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
				    <div class="form-group">
					    <label for="password">Wachtwoord: *</label>
					    <input type="password" class="form-control" name="password" id="password" required>
				    </div>
				</div>
			</div>

			<hr />

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
					    <label for="firstname">Voornaam:</label>
					    <input type="text" class="form-control" name="first_name" id="first_name">
				    </div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
				    <div class="form-group">
					    <label for="lastname">Achternaam: *</label>
					    <input type="text" class="form-control" name="last_name" id="last_name" required>
				    </div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
				    <div class="form-group">
					    <small>Alle velden met een * zijn verplicht</small>
				    </div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
				    <div class="form-group">
					    <button type="submit" class="btn btn-primary">Registreren</button>
				    </div>
				</div>
			</div>

		</form> <!-- Einde registratie form -->

		</div> <!-- Einde div container -->
	</div> <!-- Einde div wrap -->

</body>
</html>