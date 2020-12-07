<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'includes/header.inc.php'; ?>
</head>
<body>

	<?php include 'includes/nav.inc.php'; 

		  $ordernumber = $_GET['ordernumber'];
		  $sql = "SELECT * FROM ordered_products WHERE ordernumber = '$ordernumber'";
		  $result = mysqli_query($conn, $sql);
	?>

	<div id="wrap"> <!-- Begin page-wrap -->
		<div id="main" class="container"> <!-- Begin container -->

			<h1 style="color: #337ab7;">Bestelling</h1>

			<hr />
			
			<div class="row">
				 <table class="table">
				    <thead>
				      <tr>
				        <th>Product</th>
				        <th>Aantal</th>
				        <th>Prijs p/s</th>
				      </tr>
				    </thead>
				    <tbody>
				    <?php foreach($result as $value) { ?>
				      <tr>
				        <td><?php echo $value['name'] ?></td>
				        <td><?php echo $value['amount'] ?></td>
				        <td>&euro; <?php echo $value['price'] ?></td>
				      </tr>
				    <?php } ?>
				    </tbody>
				  </table>

				  <button type="button" class="btn btn-primary" onclick="history.go(-1);">Terug naar orders</button>
			</div>

		</div> <!-- Einde div container -->
	</div> <!-- Einde div wrap -->

</body>
</html>