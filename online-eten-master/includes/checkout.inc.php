<?php

session_start();

include 'dbh.inc.php';

$business_id = $_SESSION['get_id'];
$user_id = $_SESSION['user_id'];
$subTotal = $_SESSION['get_total'];
$ordernumber = '';

$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$address_number = mysqli_real_escape_string($conn, $_POST['address_number']);
$zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$order_date = date('d-m-Y'); 

$sql = "INSERT INTO orders (ordernumber, user_id, business_id, total_price, first_name, last_name, email_address, address, address_number, zipcode, city) VALUES ('$ordernumber', '$user_id', '$business_id', '$subTotal', '$first_name', '$last_name', '$email_address', '$address', '$address_number', '$zipcode', '$city'); ";
mysqli_query($conn, $sql);

$order_id = mysqli_insert_id($conn);
$ordernumber = date('dmY') . mysqli_insert_id($conn);

 mysqli_query($conn, "UPDATE `orders` set ordernumber = $ordernumber, order_id = $order_id where order_id=$order_id limit 1");

 for ($i=0; $i < count($_POST['product_name']); $i++) {

 	$product_name = mysqli_real_escape_string($conn, $_POST['product_name'][$i]);
	$product_amount = mysqli_real_escape_string($conn, $_POST['product_amount'][$i]);
	$product_price = mysqli_real_escape_string($conn, $_POST['product_price'][$i]);

	$sqlArray = array();

	 $sqlArray[] = "INSERT INTO ordered_products (ordernumber, order_id, user_id, business_id, name, amount, price) VALUES ('$ordernumber', '$order_id', '$user_id', '$business_id', '$product_name', '$product_amount', '$product_price')";
      mysqli_query($conn, implode(' ', $sqlArray));
 }

 header('Location: ../bedankt.php?ordernumber=' . $ordernumber);



?>