<?php
	session_start();
	$orderNumber = $_GET['id'];
	$_SESSION["connoteNumber"] = $orderNumber;

	header("Location: updateStatus.php");
	exit();
?>