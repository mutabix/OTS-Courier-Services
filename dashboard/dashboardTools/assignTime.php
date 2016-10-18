<?php
    include("../../dbTools/dbConnect.php");
	
	if(isset($_POST["noTimeAssigned"])) {
		$updateTime = $dbConnection->prepare("UPDATE deliveries SET deliveryDueBy=:text WHERE deliveryID=:id");
		$assignment = $_POST["noTimeAssigned"];
		$updateTime->bindParam(':text', $assignment);
		$updateTime->bindParam(':id', $_POST["packageNum"]);
		try {
		$updateTime->execute();
		} catch(Exception $error) {
			echo 'Exception -> ';
			var_dump($error->getMessage());
		}
	}
	
	if(isset($_POST["TimeReplaced"])) {
		$updateTime = $dbConnection->prepare("UPDATE deliveries SET deliveryDueBy=:text WHERE deliveryID=:id");
		$assignment = $_POST["TimeReplaced"];
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
		window.location = '../assignment.php'
	</script>
</html>