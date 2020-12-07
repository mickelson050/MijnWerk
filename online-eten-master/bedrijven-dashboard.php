<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'includes/header.inc.php'; ?>
	<?php 

	include 'includes/nav.inc.php'; 

	$user_id = $_SESSION['user_id'];
	$business_id = $_GET['business'];

	$sql = "SELECT * FROM business WHERE user_id = '$user_id' AND business_id = '$business_id'";
	$result = mysqli_query($conn, $sql);

	$getOrders = "SELECT * FROM orders WHERE business_id = '$business_id'";
	$orderResult = mysqli_query($conn, $getOrders);

	?>
</head>
<body>

	<div id="wrap"> <!-- Begin page-wrap -->
		<div id="main" class="container"> <!-- Begin container -->

				<?php foreach ($result as $business) { 

					if($business['user_id'] == $user_id && $business['business_id'] == $business_id) { ?>

					<h1 style="color: #337ab7;">Dashboard</h1>

					<hr />

			<div class="row">

				<div class="col-lg-3">
					<div class="panel panel-default">
					  <div class="panel-heading">Navigatie</div>
					  <div class="panel-body">

					  	<button onclick="location.href='edit-menulijst.php?business=<?php echo $business_id ?>'" type="button" class="btn btn-success" style="width: 100%;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Menulijst aanpassen</button>

					  </div>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="panel panel-default">
					  <div class="panel-heading">Bestellingen</div>
					  <div class="panel-body">

					<table class="table">
					    <thead>
					      <tr>
					        <th>#Ordernummer</th>
					        <th>Voornaam</th>
					        <th>Achternaam</th>
					        <th>Totaal</th>
					        <th>Actie</th>
					      </tr>
					    </thead>
					    <tbody>
					    <?php foreach($orderResult as $value) { ?>
					      <tr>
					        <td>#<?php echo $value['ordernumber'] ?></td>
					        <td><?php echo $value['first_name'] ?></td>
					        <td><?php echo $value['last_name'] ?></td>
					        <td>&euro; <?php echo $value['total_price'] ?></td>
					        <td><?php echo '<a href="show-order.php?ordernumber=' . $value['ordernumber'] . '">Bekijk bestelling</a>'; ?></td>
					    	</form>
					      </tr>
					    <?php } ?>
					    </tbody>
					  </table>

			  <?php }
			  	}
			  ?>

					  </div>
					</div>
				</div>

			</div>

		</div> <!-- Einde div container -->
	</div> <!-- Einde div wrap -->

</body>
</html>