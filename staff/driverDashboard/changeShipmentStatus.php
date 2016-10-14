<?php
	include("../../dbTools/dbConnect.php");
	
	session_start();

	$trackingNumber = $_SESSION['shippingId'];
	$_SESSION['shippingId'] = "";

	if(isset($_POST['packagePickedUp'])){
		$shipmentStatusCode = 2;
		$pendingBool = 1;
		$pickupBool = 0;


		$changeShipmentStatus = $dbConnection->prepare("UPDATE shipments SET shipmentStatusCode=:shipmentStatusCode, pendingBool=:pendingBool, pickupBool=:pickupBool, pickupDate=NOW() WHERE trackingNumber=:trackingNumber");

		$changeShipmentStatus->bindParam(':shipmentStatusCode', $shipmentStatusCode);
		$changeShipmentStatus->bindParam(':pendingBool', $pendingBool);
		$changeShipmentStatus->bindParam(':pickupBool', $pickupBool);
		$changeShipmentStatus->bindParam(':trackingNumber', $trackingNumber);

		try {
            $changeShipmentStatus->execute();
            echo "executed";
        } catch(Exception $error) {
            echo 'Exception -> ';
            var_dump($error->getMessage());
        }

	} else if(isset($_POST['packageDelivered'])){
		$shipmentStatusCode = 4;
		$pendingBool = 1;
		$pickupBool = 1;
		$processingBool = 1;
		$deliveryBool = 1;
		
		$changeShipmentStatus = $dbConnection->prepare("UPDATE shipments SET shipmentStatusCode=:shipmentStatusCode, pendingBool=:pendingBool, pickupBool=:pickupBool, processingBool=:processingBool, deliveryBool=:deliveryBool, deliveryDate=NOW() WHERE trackingNumber=:trackingNumber");

		$changeShipmentStatus->bindParam(':shipmentStatusCode', $shipmentStatusCode);
		$changeShipmentStatus->bindParam(':pendingBool', $pendingBool);
		$changeShipmentStatus->bindParam(':pickupBool', $pickupBool);
		$changeShipmentStatus->bindParam(':processingBool', $processingBool);
		$changeShipmentStatus->bindParam(':deliveryBool', $deliveryBool);
		$changeShipmentStatus->bindParam(':trackingNumber', $trackingNumber);

		try {
            $changeShipmentStatus->execute();
            echo "executed";
        } catch(Exception $error) {
            echo 'Exception -> ';
            var_dump($error->getMessage());
        }
	}

	$_POST["connoteNumber"] = $_SESSION['connoteNumber'];	
	header('Location: updateStatus.php');
	exit();

?>