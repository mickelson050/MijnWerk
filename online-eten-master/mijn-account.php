<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php

	include 'includes/header.inc.php';
	include 'includes/dbh.inc.php';
	include 'includes/nav.inc.php';

	$user_id = $_SESSION['user_id'];

	$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
	$result = mysqli_query($conn, $sql);

	if(!isset($_SESSION['user_id'])) { 
		header("Location: index.php");
		exit();
	}

	?>
</head>
<body>

	<div id="wrap"> <!-- Begin page-wrap -->
		<div id="main" class="container"> <!-- Begin container -->
			
			<h1><i class="fa fa-cog" aria-hidden="true"></i> Mijn account</h1>

			<hr />

			<?php 

			if (strpos($url,'success')) {
	            echo '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Gelukt!</strong> <br /> Uw accountgegevens zijn aangepast en opgeslagen.
                    </div>';
	        }

	        ?> 

			<div class="row">

				<div class="col-lg-3">
					<div class="panel panel-default">
					  <div class="panel-heading">Navigatie</div>
					  <div class="panel-body">

					  	<button onclick="location.href='bedrijfregistratie.php'" type="button" class="btn btn-success" style="width: 100%;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Bedrijf aanmelden</button>

					  </div>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="panel panel-default">
					  <div class="panel-heading">Accountgegevens</div>
					  <div class="panel-body">
					  	<?php foreach($result as $value) { ?>
					  	<p><strong>Voornaam:</strong> <?php echo $value['first_name']; ?><br />
					  	   <strong>Achternaam:</strong> <?php echo $value['last_name']; ?><br />
					  	   <strong>Email-adres:</strong> <?php echo $value['email_address']; ?> <br /> <br /></p>
					  	<?php } ?>

					  	   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editAccount"><i class="fa fa-pencil-square" aria-hidden="true"></i> Accountgegevens aanpassen</button>

					  </div>
					</div>
				</div>

			</div>


			<!-- Modal -->
	<div id="editAccount" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Account aanpassen</h4>
	      </div>
	      <div class="modal-body">
	        <form method="POST" action="includes/edit.account.inc.php">

	        	<div style="display: none;">
	        		<input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?> ">
	        	</div>

	        	<?php foreach($result as $value) { ?>

	        	<div class="row">
	        		<div class="col-lg-6">
					    <div class="form-group">
						    <label for="first_name">Voornaam:</label>
						    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $value['first_name']; ?> ">
					    </div>
					</div>
					<div class="col-lg-6">
					    <div class="form-group">
						    <label for="last_name">Achternaam:</label>
						    <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $value['last_name']; ?> ">
					    </div>
					</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-lg-12">
					    <div class="form-group">
						    <label for="email_address">Email-adres:</label>
						    <input type="text" class="form-control" name="email_address" id="email_address" value="<?php echo $value['email_address']; ?> ">
					    </div>
					</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-lg-12">
					    <div class="form-group">
						    <label for="password">Wachtwoord:</label>
						    <input type="password" class="form-control" name="password" id="password" placeholder="Indien nodig: Vul een nieuw wachtwoord in">
					    </div>
					</div>
	        	</div>

	        	<hr />

	        	<div class="row">
	        		<div class="col-lg-12">
					    <div class="form-group">
						    <button type="submit" class="btn btn-danger" name="delete" style="width: 100%;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Verwijder mijn account <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></button>
					    </div>
					</div>
	        	</div>

	        	<?php } ?>

	      </div>
	      <div class="modal-footer">
	      	<button type="submit" name="submit" class="btn btn-success">Opslaan</button>
	      	</form>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
				

		</div> <!-- Einde div container -->
	</div> <!-- Einde div wrap -->

</body>
</html>