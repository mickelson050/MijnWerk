<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'includes/header.inc.php'; ?>
</head>
<body>

	<?php include 'includes/nav.inc.php'; 

	$business_id = $_GET['business'];
	$sql_voorgerecht = "SELECT * FROM menu m JOIN menuitem mi ON (m.business_id = mi.business_id) WHERE m.business_id = '$business_id' AND mi.categorie = 'voorgerecht'";
	$voorgerechten = mysqli_query($conn, $sql_voorgerecht);

	$sql_hoofdgerecht = "SELECT * FROM menu m JOIN menuitem mi ON (m.business_id = mi.business_id) WHERE m.business_id = '$business_id' AND mi.categorie = 'hoofdgerecht'";
	$hoofdgerechten = mysqli_query($conn, $sql_hoofdgerecht);

	$sql_nagerecht = "SELECT * FROM menu m JOIN menuitem mi ON (m.business_id = mi.business_id) WHERE m.business_id = '$business_id' AND mi.categorie = 'nagerecht'";
	$nagerechten = mysqli_query($conn, $sql_nagerecht);

	$get_menu = "SELECT * FROM menu WHERE business_id = '$business_id'";
	$menu = mysqli_query($conn, $get_menu);

	$get_menuitem = "SELECT * FROM menuitem WHERE business_id = '$business_id'";
	$menuitem = mysqli_query($conn, $get_menuitem);

	$sql = "SELECT * FROM business WHERE user_id = '$user_id' AND business_id = '$business_id'";
	$result = mysqli_query($conn, $sql);

	if(isset($_POST['submit'])) {
		foreach($menu as $item) {

		$menu_id = $item['menu_id'];
		$business_id = $_GET['business'];
		$productname = mysqli_real_escape_string($conn, $_POST['productname']);
		$productprice = mysqli_real_escape_string($conn, $_POST['productprice']);
		$categorie = mysqli_real_escape_string($conn, $_POST['product_categorie']);

		$sql = "INSERT INTO menuitem (menu_id, business_id, productname, price_medium, categorie) VALUES ('$menu_id', '$business_id', '$productname', '$productprice', '$categorie');";
		mysqli_query($conn, $sql);

		header("Location: edit-menulijst.php?business=" . $business_id);	

		}
	}

	?>

	<div id="wrap"> <!-- Begin page-wrap -->
		<div id="main" class="container"> <!-- Begin container -->

			<?php foreach ($result as $business) { 

					if($business['user_id'] == $user_id && $business['business_id'] == $business_id) { ?>
			
			<h1 style="color: #337ab7;">Menulijst</h1>

			<hr/>
		<div class="row">
			<div class="col-lg-12">
			<label>Voorgerecht</label>
			<?php 
		    	if (!$voorgerechten->num_rows > 0) {
		    		echo '<p style="text-align: center;">';
		    		echo '<button style="width: 100%;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#createItem">Maak nu uw eerste voorgerecht item aan.</button>';
		    	} else { ?>
			  <table class="table">
			    <thead>
			      <tr>
			        <th>Naam</th>
			        <th>Prijs</th>
			        <th>Actie</th>
		   	      </tr>
			    </thead>
			    <tbody>
			    <?php foreach($voorgerechten as $voorgerecht) { ?>
			      <tr>
			        <td><?php echo $voorgerecht['productname']; ?></td>
			        <td>&euro; <?php echo $voorgerecht['price_medium']; ?></td>
			        <td><?php echo '<a href="includes/delete-menuitem.inc.php?delete=' . $voorgerecht['menuitem_id'] . '">&nbsp;<i class="fa fa-times" aria-hidden="true"></i></a></td>'; ?></td>
			      </tr>
			    <?php } ?>
			    </tbody>
			  </table>
			  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createItem">Voeg een voorgerecht toe</button>
			 <?php } ?>

			</div>
		</div>

		<hr />

		<div class="row">
			<div class="col-lg-12">
				<label>Hoofdgerecht</label>
			<?php 
		    	if (!$hoofdgerechten->num_rows > 0) {
		    		echo '<p style="text-align: center;">';
		    		echo '<button style="width: 100%;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#createItem">Maak nu uw eerste hoofdgerecht item aan.</button>';
		    	} else { ?>
			  <table class="table">
			    <thead>
			      <tr>
			        <th>Naam</th>
			        <th>Prijs</th>
			        <th>Actie</th>
		   	      </tr>
			    </thead>
			    <tbody>
			    <?php foreach($hoofdgerechten as $hoofdgerecht) { ?>
			      <tr>
			        <td><?php echo $hoofdgerecht['productname']; ?></td>
			        <td><?php echo '&euro;' . $hoofdgerecht['price_medium'] . '</td>'; ?>
			        <td><?php echo '<a href="includes/delete-menuitem.inc.php?delete=' . $hoofdgerecht['menuitem_id'] . '">&nbsp;<i class="fa fa-times" aria-hidden="true"></i></a></td>'; ?></td>
			      </tr>
			    <?php } ?>
			    </tbody>
			  </table>
			  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createItem">Voeg een hoofdgerecht toe</button>
			 <?php } ?>

			</div>
		</div>

		<hr />

		<div class="row">
			<div class="col-lg-12">
				<label>Nagerecht</label>
			<?php 
		    	if (!$nagerechten->num_rows > 0) {
		    		echo '<p style="text-align: center;">';
		    		echo '<button style="width: 100%;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#createItem">Maak nu uw eerste nagerecht item aan.</button>';
		    	} else { ?>
			  <table class="table">
			    <thead>
			      <tr>
			        <th>Naam</th>
			        <th>Prijs</th>
			        <th>Actie</th>
		   	      </tr>
			    </thead>
			    <tbody>
			    <?php foreach($nagerechten as $nagerecht) { ?>
			      <tr>
			        <td><?php echo $nagerecht['productname']; ?></td>
			        <td><?php echo '&euro;' . $nagerecht['price_medium'] . '</td>'; ?>
			        <td><?php echo '<a href="includes/delete-menuitem.inc.php?delete=' . $nagerecht['menuitem_id'] . '">&nbsp;<i class="fa fa-times" aria-hidden="true"></i></a></td>'; ?></td>
			      </tr>
			    <?php } ?>
			    </tbody>
			  </table>
			  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createItem">Voeg een nagerecht toe</button>
			 <?php } ?>

			</div>
		</div>

		<?php }
			} ?>

		</div> <!-- Einde div container -->
	</div> <!-- Einde div wrap -->

	<!-- Create item Modal -->
<div id="createItem" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Maak nieuwe item aan</h4>
      </div>
      <div class="modal-body">
       	<form method="POST">
       	
       	<div class="row">
       		<div class="col-lg-9">
	       		<div class="form-group">
				    <label for="productname">Productnaam:</label>
				    <input type="text" name="productname" class="form-control" id="productname">
				</div>
			</div>

			<div class="col-lg-3">
				<div class="form-group">
				    <label for="productprice">Prijs:</label>
				    <input type="text" name="productprice" class="form-control" id="productprice" placeholder="&euro;">
				</div>
			</div>
		</div>

			<div class="form-group">
			    <label for="product_categorie">Categorie:</label>
			    <select class="form-control" id="product_categorie" name="product_categorie">
				    <option>Voorgerecht</option>
				    <option>Hoofdgerecht</option>
				    <option>Nagerecht</option>
				</select>
			</div>

			<div class="form-group">
			    <input type="submit" name="submit" class="btn btn-primary" value="Aanmaken">
			</div>

       	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


</body>
</html>