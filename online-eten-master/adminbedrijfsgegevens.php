<!DOCTYPE html>
<html>
<head>
	<title>Menulijst</title>
	<?php include 'includes/header.inc.php';

	?>
</head>
<body>

	<?php 
		  include 'includes/nav.inc.php'; 
		  include 'includes/functions.inc.php';
		  include 'includes/dbh.inc.php';
		if(isset($_SESSION['user_id'])){
		$user = $_SESSION['user_id'];
		$query = "SELECT * from users where user_id = '$user'";
		$results = mysqli_query($conn, $query);

		if(!$results){
			die("DOET HET NIET!");
		}
		if ($results->num_rows > 0) {
	    	// output data of each row
	   
	    	while($user = mysqli_fetch_assoc($results)) {
			   if ($user['rank'] == 'admin') {
		 			$id = null;
					
					if (isset($_GET['business']) && is_numeric($_GET['business'])) {
						$id = mysqli_real_escape_string($conn, $_GET['business']);
					}
					echo '<div id="wrap"><div id="main" class="container">';
		 			bedrijfsgegevens($id); 
		 			echo '</div></div>';  
				} else {
					
		    		header("Location: index.php");
							exit();
				} 
	    			
	    	}
	    }
	}else {
		header("Location: index.php");
							exit();
	}

		


		?>

	
	
	

</body>
</html>