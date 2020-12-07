<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'includes/header.inc.php'; 
		  include 'includes/functions.inc.php';
		  include 'includes/dbh.inc.php'; 
		  include 'includes/nav.inc.php';

		  if(isset($_SESSION['user_id'])) {

		  $business_id = $_SESSION['get_id'];	

		  $user_id = $_SESSION['user_id'];
		  $sql = "SELECT * FROM user_details WHERE user_id = '$user_id'";
		  $result = mysqli_query($conn, $sql);
		  }
	?>
</head>
<body>

	<div id="wrap"> <!-- Begin page-wrap -->
		<div id="main" class="container"> <!-- Begin container -->

		<h1 style="color: #337ab7;"><i class="fa fa-money" aria-hidden="true"></i> Betalen</h1>	
		
		<hr />

	<form method="POST" action="includes/checkout.inc.php">
		<div class="row">
			<div class="col-lg-12">
				<label>Winkelmandje</label>
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
					  <strong>Totaal: </strong> &euro; <?php getTotal(); ?>
			</div>
		</div>

		<hr />

			<hr />

			<label>Vul bezorggegevens in</label>
			<div class="row">
						<div class="col-lg-6">
						    <div class="form-group">
							    <label for="first_name">Voornaam: *</label>
							    <input type="first_name" class="form-control" name="first_name" id="first_name" required>
						    </div>
						</div>
						<div class="col-lg-6">
						    <div class="form-group">
							    <label for="first_name">Achternaam *</label>
							    <input type="first_name" class="form-control" name="last_name" id="first_name" required>
						    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
							    <label for="email">Email-adres *</label>
							    <input type="email_address" class="form-control" name="email_address" id="email_address" required>
						    </div>
						</div>
					</div>

					<div class="row">
				<div class="col-lg-8">
				    <div class="form-group">
					    <label for="address">Adres: *</label>
					    <input type="text" class="form-control" name="address" id="address" required>

				    </div>
				</div>

				<div class="col-lg-2">
				    <div class="form-group">
					    <label for="zipcode">Nummer: *</label>
					    <input type="text" class="form-control" name="address_number" id="address_number" placeholder="23" required>
				    </div>
				</div>

				<div class="col-lg-2">
				    <div class="form-group">
					    <label for="zipcode">Postcode: *</label>
					    <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="8520EB" required>
				    </div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
				    <div class="form-group">
					    <label for="lastname">Woonplaats: *</label>
					    <select class="form-control" name="city">
					    	<option value="Groningen">Groningen</option>
					    	<option value="Stadskanaal">Stadskanaal</option>
					    	<option value="Nieuw-buinen">Nieuw-buinen</option>
					    	<option value="Foxhol">Foxhol</option>
					    </select>
				    </div>
				</div>
			</div>

			<hr />

                  <div class="row">
					<div class="col-lg-12">
						<div class="form-group">
						  <label for="sel1">Selecteer betaalwijze:</label>
						  <select class="form-control" id="sel1">
						    <option>IDEAL</option>
						    <option>PayPal</option>
						    <option>Mastercard</option>
						    <option>Betalen aan deur</option>
						  </select>
						</div>
					</div>
				</div>

				<div class="row">
				<div class="col-lg-12">
				    <div class="form-group">
					    <button class="btn btn-primary">Betalen</button>
				    </div>
				</div>
			</div>
                  
                
                </div>
              </div>
            </div>

          </form>




		</div> <!-- Einde div container -->
	</div> <!-- Einde div wrap -->

</body>
</html>