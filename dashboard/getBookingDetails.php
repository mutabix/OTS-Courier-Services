<?php
	session_start();
	$orderNumber = $_GET['id'];
	$_SESSION['shipmentTrackingId'] = $orderNumber;

	header("Location: bookingDetails.php");
	exit();

?>