<?php

	include 'includes/header.inc.php';
	include 'includes/unset_shoppingcart.inc.php';

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
		<div class="row banner">
			<?php include 'includes/nav.inc.php'; ?>
			<div class="container">
				<div class="row"> <!-- Input Place of Residence -->
					<form action="restaurants.php" method ="GET">
						<div class="col-lg-12" id="index-middle">
								<div class="form-group">
									<h1 style="text-align: center; color: #FFF;">Snel eten via Online-eten.nl</h1>
								    <input type="text" class="form-control" name="input-location" id="input-location" placeholder="Vul plaatsnaam in. b.v. Groningen">
								</div>
								<div class="form-group">
								    <button type="submit" class="btn btn-primary" name="search-location" id="search-location">ZOEKEN NAAR RESTAURANTS IN DE BUURT</button>
								</div>
						</div>
					</form>
				</div>
			</div>
		</div>

</body>
</html>
