<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	include 'includes/header.inc.php'; 
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	?>
</head>
<body>

	<?php include 'includes/nav.inc.php'; ?>

	<div id="wrap"> <!-- Begin page-wrap -->
		<div id="main" class="container"> <!-- Begin container -->

			<h1 style="color: #337ab7;"><i class="fa fa-sign-in" aria-hidden="true"></i> Inloggen</h1>

			<hr>

			<?php 

			if (strpos($url,'error')) {
	            echo '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Het inloggen is niet gelukt...</strong> <br />
                        <ul>
                        	<li>Controleer het email-adres</li>
                        	<li>Controleer het wachtwoord</li>
                        </ul>
                    </div>';
	        }

			?>

			<form method="POST" action="includes/login.inc.php">
				
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
					    <label for="email-address">Email-adres:</label>
					    <input type="email" class="form-control" name="email_address" id="email_address" required>
				    </div>
			  	</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
				    <div class="form-group">
					    <label for="password">Wachtwoord:</label>
					    <input type="password" class="form-control" name="password" id="password" required>
				    </div>
				</div>
			</div>

			<hr />

			<div class="row">
				<div class="col-lg-12">
				    <div class="form-group">
					    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Inloggen</button>
				    </div>
				</div>
			</div>


			</form>



		</div> <!-- Einde div container -->
	</div> <!-- Einde div wrap -->

</body>
</html>