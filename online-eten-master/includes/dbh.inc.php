<?php 

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "online_eten";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(mysqli_connect_errno($conn)){
	die("De verbinding met de database is mislukt") .
			mysqli_connect_error( 
			" (".mysqli_connect_errno().")" ); 

}