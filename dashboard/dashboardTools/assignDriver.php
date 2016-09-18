<?php
    include("../../dbTools/dbConnect.php");
	
	if(isset($_POST["noDriverAssigned"])) {
		$updateDelivery = $dbConnection->prepare("UPDATE deliveries SET shipmentStatus=:text WHERE deliveryID=:id");
		$assignment = $_POST["noDriverAssigned"];
		$assignmentFinal = "Assigned to Driver ".$assignment;
		$updateDelivery->bindParam(':text', $assignmentFinal);
		$updateDelivery->bindParam(':id', $_POST["packageNum"]);
		try {
		$updateDelivery->execute();
		} catch(Exception $error) {
			echo 'Exception -> ';
			var_dump($error->getMessage());
		}
		$updateDriver = $dbConnection->prepare("UPDATE deliveries SET assignedDriver=:text WHERE deliveryID=:id");
		$updateDriver->bindParam(':text', $assignmentFinal);
		$updateDriver->bindParam(':id', $_POST["packageNum"]);
		try {
		$updateDriver->execute();
		} catch(Exception $error) {
			echo 'Exception -> ';
			var_dump($error->getMessage());
		}
	}
	
	if(isset($_POST["DriverReplaced"])) {
		$updateDelivery = $dbConnection->prepare("UPDATE deliveries SET shipmentStatus=:text WHERE deliveryID=:id");
		$assignment = $_POST["DriverReplaced"];
		$assignmentFinal = "Assigned to Driver ".$assignment;
		$updateDelivery->bindParam(':text', $assignmentFinal);
		$updateDelivery->bindParam(':id', $_POST["packageNum"]);
		try {
		$updateDelivery->execute();
		} catch(Exception $error) {
			echo 'Exception -> ';
			var_dump($error->getMessage());
		}
		$updateDriver = $dbConnection->prepare("UPDATE deliveries SET assignedDriver=:text WHERE deliveryID=:id");
		$updateDriver->bindParam(':text', $assignmentFinal);
		$updateDriver->bindParam(':id', $_POST["packageNum"]);
		try {
		$updateDriver->execute();
		} catch(Exception $error) {
			echo 'Exception -> ';
			var_dump($error->getMessage());
		}
	}
?>

<!doctype html>
<html lang="en">
	<script>
		window.location = '../assignment.php'
	</script>
</html>