<?php

include 'functions.inc.php';

if(!isset($_SESSION)) {

session_start();

}

if(isset($_SESSION['user_id'])) {

	$tmp = $_SESSION['user_id'];
	session_unset();
	$_SESSION['user_id'] = $tmp;

}
else {
	session_unset();
}