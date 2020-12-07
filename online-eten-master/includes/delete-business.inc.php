<?php
include 'header.inc.php'; 
session_start();
include 'dbh.inc.php';

	 
?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<?php include 'nav.inc.php'; 

		if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];

		$query = "SELECT * from users where user_id = '$user_id'";
		
		$results = mysqli_query($conn, $query);

		if(!$results){
			die("DOET HET NIET!");
		}
		if ($results->num_rows > 0) {
	    	// output data of each row
	   
	    	while($user = mysqli_fetch_assoc($results)) {
	    		if ($user['rank'] == 'admin') {
		 			$business = $_GET["business"];
			 		$query = "DELETE business, business_location from business  inner join  business_location where business.business_id = business_location.business_id and business.business_id='$business'";
			 
					if ($conn->query($query) === TRUE) {

						header("Location: ../adminindex.php?delete=success");

			 		}
				} else {
    		
				} 
	    			
	    	}
	    }
	}else{
		header("Location: index.php");
					exit();
	}



	?>

	</body>