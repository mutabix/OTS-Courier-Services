<?php
    include("../../../dbTools/dbConnect.php");
	
	if(isset($_POST["noPriorityAssigned"])) {
		$updateDelivery = $dbConnection->prepare("UPDATE deliveries SET priority=:text WHERE deliveryID=:id");
		$assignment = $_POST["noPriorityAssigned"];
		$updateDelivery->bindParam(':text', $assignment);
		$updateDelivery->bindParam(':id', $_POST["packageNum"]);
		try {
		$updateDelivery->execute();
		} catch(Exception $error) {
			echo 'Exception -> ';
			var_dump($error->getMessage());
		}
	}
	
	if(isset($_POST["PriorityReplaced"])) {
		$updateDelivery = $dbConnection->prepare("UPDATE deliveries SET priority=:text WHERE deliveryID=:id");
		$assignment = $_POST["PriorityReplaced"];
		$updateDelivery->bindParam(':text', $assignment);
		$updateDelivery->bindParam(':id', $_POST["packageNum"]);
		try {
		$updateDelivery->execute();
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