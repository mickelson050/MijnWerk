<?php

function restaurants($restaurants){
	include 'dbh.inc.php';
	$query = "SELECT * FROM business bus join business_location loc on (bus.business_id = loc.business_id) where loc.city like '$restaurants'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		die("DOET HET NIET!");
	}
if ($result->num_rows > 0) {
    // output data of each row
   
    while($business = mysqli_fetch_assoc($result)) {
    	echo '<div class="row">' . '<a href="menulijst.php?business='.$business['business_id'].'">'. '<div class="col-lg-12" style="border: 1px solid #e0e0e0; padding-left: 0px; background: #FFF; margin-bottom: 10px">' . '<img src="assets/img/placeholder.png" width="100px" height="100px">'. '<strong style="font-size: 17px; margin-left: 9px;">' . $business['name'] . '</strong>' . '</div>' . '</div>' ;

    	
    }
    
}
else {
	echo '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Helaas..</strong> <br /> Er zijn geen restaurants gevonden in ' . $restaurants . '
                    </div>';
	} 
}

function stad($stad){
	include 'dbh.inc.php';
	$query = "SELECT DISTINCT (city) FROM business_location  where city like '$stad'";
	$result = mysqli_query($conn, $query);
		if(!$result){
			die("DOET HET NIET!");
		}
		if ($result->num_rows > 0) {
    	// output data of each row
   
    	while($stadnaam = mysqli_fetch_assoc($result)) {
    		echo $stadnaam['city'];
		}
}
}

function gerechten($id = null, $catagorie){
	

	include 'dbh.inc.php';
	$query = "SELECT * FROM menuitem";
	if ($id) {
		$query .= " WHERE business_id = $id and categorie = '$catagorie'";
	}

	$results = mysqli_query($conn, $query);
// 	$query = " SELECT productname from menuitem";
// 		$result = mysqli_query($conn, $query);
		if(!$results){
			die("DOET HET NIET!");
		}
		if ($results->num_rows > 0) {
	    	// output data of each row
	   
	    	while($gerechten = mysqli_fetch_assoc($results)) {
	    		echo '
	    		<form method="POST" class="addToCart" action="includes/add-to-cart.inc.php?add=' . $gerechten['menuitem_id'] . '">
	    		<div class="well"> <div class="row">
	  					<div class="col-lg-12">
  							<div class="pull-left">
  								<strong id="productname" style="font-size: 17px;">' . $gerechten['productname'] . '</strong>
  							</div>
  							<div class="pull-right">
  								<button type="submit" class="btn btn-primary addToCart" name="add" id="addToCart" style="margin-top: -3px;">€'.$gerechten['price_medium'].'  <i class="fa fa-plus" aria-hidden="true"></i></button>
  							</div>
	  					</div>
	  				</div>
	  			</div>
	  		</form>';
		}
	}
}

function cart() {
	include 'dbh.inc.php';
	$total = 0;
	$sub = 0;
	foreach($_SESSION as $name => $value) {
		if($value > 0) {
			if(substr($name, 0,5)=='cart_') {
				$id = substr($name, 5, strlen($name)-5);
				$sql = "SELECT * FROM menuitem WHERE menuitem_id = '$id'";
				$result = mysqli_query($conn, $sql);
				while ($sqlResult = mysqli_fetch_assoc($result)) {
				$sub = $sqlResult['price_medium'] * $value;
					echo '
					        <td class="productname">' .  $sqlResult['productname'] . '</td>
					        <td class="count">' .  $value . '</td>
					        <td>&euro; <span class="price"> ' . $sqlResult['price_medium'] . ' </span</td>
					        <td>&euro; <span class="subtotal"> ' . number_format((float)$sub, 2, '.', '') . ' </span></td>
					        <input type="text" style="display: none;" name="product_name[]" value="'. $sqlResult['productname'] .'">
					        <input type="text" style="display: none;" name="product_amount[]" value="'. $value .'">
					        <input type="text" style="display: none;" name="product_price[]" value="'. $sub .'">
					        <td><a href="includes/add-to-cart.inc.php?remove=' . $id . '">[-] </a><a href="includes/add-to-cart.inc.php?add=' . $id . '">[+] </a><a href="includes/add-to-cart.inc.php?delete=' . $id . '">[x]</a>
					      </tr>
					';
				}
			}
		}
	}
}

function getTotal() {
	include 'dbh.inc.php';
	global $total;
	$total = 0;
	$price = 0;
	foreach($_SESSION as $name => $value) {
		if($value > 0) {
			if(substr($name, 0,5)=='cart_') {
				$id = substr($name, 5, strlen($name)-5);
				$sql = "SELECT * FROM menuitem WHERE menuitem_id = '$id'";
				$result = mysqli_query($conn, $sql);
				while ($sqlResult = mysqli_fetch_assoc($result)) {
				$price = $sqlResult['price_medium'] * $value;
				}
			}
			$total += $price;
		}
	}	
	echo $total;
}

function bedrijven(){
	include 'dbh.inc.php';
	$query = "SELECT * FROM business";
	$result = mysqli_query($conn, $query);
	if(!$result){
		die("DOET HET NIET!");
	}
if ($result->num_rows > 0) {
    // output data of each row
   
    while($bedrijf = mysqli_fetch_assoc($result)) {
    	echo '<div class="row"><form method="POST" action="includes/delete-business.inc.php?business='.$bedrijf['business_id'].'">' . '<a href="adminbedrijfsgegevens.php?business='.$bedrijf['business_id'].'" name="'.$bedrijf['business_id'].'">'. '<div class="col-lg-12" style="border: 1px solid #e0e0e0; padding-left: 0px; background: #FFF; margin-bottom: 10px">' . '<img src="assets/img/placeholder.png" width="100px" height="100px">'. '<strong style="font-size: 17px; margin-left: 9px;">' . $bedrijf['name'] . '</a> <button type="submit" name="delete" style="float: right;">delete</button>' . '</strong>' . '</div>' . '</form></div> ';

    	
    }
    
}
}


function bedrijfsgegevens($id = null){
	include 'dbh.inc.php';
	$query = "SELECT * FROM business_location where business_id = '$id'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		die("DOET HET NIET!");
	}
if ($result->num_rows > 0) {
    // output data of each row
   
    while($bedrijfsgegevens = mysqli_fetch_assoc($result)) {
    	echo '
					<div class="row"> 
    				<div class="col-lg-12" style="border: 1px solid #e0e0e0; padding-left: 30px; background: #FFF; margin-bottom: 10px">
    					<form method="post" action="includes/delete-business.inc.php?business='.$bedrijfsgegevens['business_id'].'">' .  '<strong style="font-size: 17px; margin-left: 0px;">'. 'Adres: ' .$bedrijfsgegevens['address'] . '<br/>' .
    	 'Huisnummer: ' . $bedrijfsgegevens['address_number'] . '<br/>' .
    	 'Postcode: ' . $bedrijfsgegevens['zipcode'] . '<br/>' .
    	 'Stad: '.$bedrijfsgegevens['city'] . '<br/>' .
    	'</strong>' .

    	'</form></div>' . 
    	'</div>';
    }
}

}

?>