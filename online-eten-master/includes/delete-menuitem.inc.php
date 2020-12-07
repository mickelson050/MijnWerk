<?php

include 'dbh.inc.php';

	$menuitem_id = $_GET['delete'];
		
		$sql = "DELETE FROM menuitem WHERE menuitem_id = '$menuitem_id'";
		mysqli_query($conn, $sql);	

		header('Location: ' . $_SERVER['HTTP_REFERER']);
	