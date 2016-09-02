<?php
	$getShipmentId = $dbConnection->prepare("SELECT MAX(shipmentId) FROM bookings");
	$getShipmentId->execute();
	$maxShipmentID = $getShipmentId->fetch();

	$shipmentId = $maxShipmentID + 1;
?>