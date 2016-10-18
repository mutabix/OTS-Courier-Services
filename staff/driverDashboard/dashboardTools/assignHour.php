<?php
    include("../../../dbTools/dbConnect.php");
	
	if(isset($_POST["noHourAssigned"])) {
		$updateTime = $dbConnection->prepare("UPDATE deliveries SET deliveryTime=:text WHERE deliveryID=:id");
		$assignment = $_POST["noHourAssigned"];
		$updateTime->bindParam(':text', $assignment);
		$updateTime->bindParam(':id', $_POST["packageNum"]);
		try {
		$updateTime->execute();
		} catch(Exception $error) {
			echo 'Exception -> ';
			var_dump($error->getMessage());
		}
	}
	
	if(isset($_POST["HourReplaced"])) {
		$updateTime = $dbConnection->prepare("UPDATE deliveries SET deliveryTime=:text WHERE deliveryID=:id");
		$assignment = $_POST["HourReplaced"];
		$updateTime->bindParam(':text', $assignment);
		$updateTime->bindParam(':id', $_POST["packageNum"]);
		try {
		$updateTime->execute();
		} catch(Exception $error) {
			echo 'Exception -> ';
			var_dump($error->getMessage());
		}
	}
?>

<!doctype html>
<html lang="en">
	<script>
		window.location = '../dailydeliveries.php'
	</script>
</html>