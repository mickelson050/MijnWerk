<?php

	include 'dbh.inc.php';
	
	$u_id = $_POST['user_id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email_address = $_POST['email_address'];
	$password = $_POST['password'];

	if(isset($_POST['submit'])) {
	if(trim($password) == '') {

		$sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email_address = '$email_address' WHERE user_id = '$u_id'";
		mysqli_query($conn, $sql);
		header("Location: ../mijn-account.php?save=success");
	}
	else {

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		$sqlTest = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email_address = '$email_address', password = '$hashedPassword' WHERE user_id = '$u_id'";
		mysqli_query($conn, $sqlTest);
		header("Location: ../mijn-account.php?save=success");
	}
}

if(isset($_POST['delete'])) {
	$sql = "DELETE FROM users WHERE user_id = '$u_id'";
	mysqli_query($conn, $sql);
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../account-deleted.php");
}
?>