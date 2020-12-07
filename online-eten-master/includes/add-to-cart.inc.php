<?php

	include 'dbh.inc.php';
	include 'functions.inc.php';

	session_start();

	$item_id = $_GET['add'];
	$sql = "SELECT * FROM menuitem WHERE menuitem_id = '$item_id'";
	$result = mysqli_query($conn, $sql);

	if(isset($_GET['add'])) {
		$cart = $_SESSION['cart_' . $_GET['add']]+='1';
	}
	if(isset($_GET['remove'])) {
		$_SESSION['cart_' . $_GET['remove']]--;
	}
	if(isset($_GET['delete'])) {
		$_SESSION['cart_' . $_GET['delete']]='0';
	}

	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>