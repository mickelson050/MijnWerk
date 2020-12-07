<?php

	include 'dbh.inc.php';

	$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
	$email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$address_number = mysqli_real_escape_string($conn, $_POST['address_number']);
	$zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$rank = 'gebruiker';

	if(empty($first_name) || empty($last_name) || empty($email_address) || empty($password)) {
		header("Location: ../registreren.php?signup=empty");
		exit();
	}
	else {
		$sql = "SELECT * FROM users WHERE email_address = '$email_address' ";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck > 0) {
			header("Location: ../registreren.php?signup=usertaken");
		exit();
	}
	else {	
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		
		$sql = "INSERT INTO users (first_name, last_name, email_address, password, rank) VALUES ('$first_name', '$last_name', '$email_address', '$hashedPassword', '$rank'); ";
		mysqli_query($conn, $sql);

		header("Location: ../registreren.php?signup=success");
	}
}
