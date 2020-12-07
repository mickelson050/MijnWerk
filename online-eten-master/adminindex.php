<?php
		include 'includes/nav.inc.php'; 
		include 'includes/functions.inc.php';
	    include 'includes/dbh.inc.php';
		if(isset($_SESSION['user_id'])){
		$userid = $_SESSION['user_id'];

		$query = "SELECT * from users where user_id = '$user_id' and rank = 'admin'";
		
		$results = mysqli_query($conn, $query);

		if(!$results){
			die("DOET HET NIET!");
		}
		echo '<div id="wrap"><div id="main" class="container">';
		if (strpos($url,'delete=success')) {
	            echo '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Success! </strong>Het bedrijf is verwijderd. <br />
                    </div>';
	        }
 		bedrijven();   
	    echo '</div></div>';			
	    	
	    
		}else{
			header("Location: index.php");
					exit();
		}
	    ?>
	}
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<?php include 'includes/header.inc.php';

	?>
</head>
<body>

	<?php 
		  
	?>

	


	
	

</body>
</html>