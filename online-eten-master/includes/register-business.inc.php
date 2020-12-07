<?php 
include "dbh.inc.php";
session_start();
$user_id = $_SESSION['user_id'];

$business_name = mysqli_real_escape_string($conn, $_POST['bedrijfsnaam']);
$phone_number = mysqli_real_escape_string($conn, $_POST['phonenumber']);
$street_name = mysqli_real_escape_string($conn, $_POST['address']);
$street_number = mysqli_real_escape_string($conn, $_POST['address1']);
$street_extra = mysqli_real_escape_string($conn, $_POST['address2']);
$zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);
$business_register = mysqli_real_escape_string($conn, $_POST['bedrijfscode']);
$city = mysqli_real_escape_string($conn, $_POST['plaatsnaam']);


if ($business_register != 1111) {
	echo "vul de juiste bedrijfscode in.";
	
	}else{
		$sql = "INSERT INTO business (user_id, name ) VALUES ('$user_id', '$business_name' );";
		mysqli_query($conn, $sql);

		$get_business = "SELECT * FROM business ORDER BY business_id DESC LIMIT 1";
		$result = mysqli_query($conn, $get_business);

		$business_id = mysqli_fetch_assoc($result)['business_id'];

		$sql_location = "INSERT INTO business_location (business_id, address, address_extra, address_number, phone_number, zipcode, city) VALUES ('$business_id', '$street_name', '$street_extra', '$street_number', '$phone_number', '$zipcode', '$city' );";
		mysqli_query($conn, $sql_location);

		$sql_addmenu = "INSERT INTO menu (business_id) VALUES ('$business_id')";
		mysqli_query($conn, $sql_addmenu);

		header("Location: ../bedrijfregistratie.php?save=success");
			} 





 ?>