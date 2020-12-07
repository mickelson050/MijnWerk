<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'includes/header.inc.php'; ?>
	<?php 
	include 'includes/nav.inc.php';

	if(isset($_SESSION['user_id'])) {
	
	$user_id = $_SESSION['user_id'];

	$query = "SELECT * FROM business bus join business_location loc on (bus.business_id = loc.business_id) WHERE user_id = '$user_id'";
	$result = mysqli_query($conn, $query);

	}
	 ?>

</head>
<body>

	<div id="wrap"> <!-- Begin page-wrap -->
		<div id="main" class="container"> <!-- Begin container -->
			
			<h1>Mijn bedrijven </h1>
				<hr>

				<div class="row">
					<div class="col-lg-12">
						 <table class="table">
						    <thead>
						      <tr>
						        <th>Bedrijfsnaam</th>
						        <th>Adres</th>
						        <th>Stad</th>
						        <th>Actie</th>
						      </tr>
						    </thead>
						    <tbody>
						    	<?php foreach($result as $value){ ?>

						      <tr>
						        <td><?php echo $value['name'] ?></td>
						        <td><?php echo $value['address'] ?>, <?php echo $value['address_number'] ?></td>
						        <td><?php echo $value['city'] ?></td>
						        <td><?php echo '<a href="bedrijven-dashboard.php?business=' . $value['business_id'] . '">Bekijk</a>'; ?></td>
						      </tr>
						      <?php }  ?>
						    </tbody>
						  </table>
					</div>
				</div>

		</div> <!-- Einde div container -->
	</div> <!-- Einde div wrap -->

</body>
</html>