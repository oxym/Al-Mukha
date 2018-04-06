<?php
session_start();
require_once('dbh.inc.php');

if (!isset($_POST['submit'])) {
	header("Location: ../404.php");
	exit();
} else {
	if (!$_SESSION['account_type']=='customer') {
		header("Location: ../404.php");
		exit();
	} else {
		require_once('customer.inc.php');
		$product = new Customer($_SESSION['user_id']);
		$product->comment($_POST['sid'], $_POST['name'], $_POST['userRating'], $_POST['userComment']);
		header("Location: ../productDetails.php?SID=".$_POST['sid']." &Name=".$_POST['name']);
		exit();
	}
}
?>