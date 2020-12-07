<?php

session_start();

	include 'dbh.inc.php';

	$email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if(empty($email_address) || empty($password)) {
		
		header("Location: ../inloggen.php?login=empty");
		exit();

	} else {
		$sql = "SELECT * FROM users WHERE email_address ='$email_address'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck < 1) {
			header("Location: ../inloggen.php?login=error");
			exit();
		} else {
			if($row = mysqli_fetch_assoc($result)) {
				$hashedPasswordCheck = password_verify($password, $row['password']);
				if($hashedPasswordCheck == false) {
					header("Location: ../inloggen.php?login=error");
					exit();
				} elseif($hashedPasswordCheck == true) {
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['email_address'] = $row['email_address'];
					$_SESSION['rank'] = $row['rank'];
					header("Location: ../index.php");
					exit();
				}
			}
		}
	}
