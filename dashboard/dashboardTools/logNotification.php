<?php
    include("../../dbTools/dbConnect.php");
	
	$receiver = $_POST["Recipients"];
	$noteType = $_POST["Type"];
	$noteMessage = $_POST["noteMessage"];
	$today = date("Y-m-d H:i:s");
	$address = $_POST["otherName"];
	if ($receiver == "Employees") {
		$getEmployees = $dbConnection->prepare('SELECT email FROM employees');
		$getEmployees->execute();
		foreach ($getEmployees as $employeeAddress) {
			$noteID = rand();
			$sendNote = $dbConnection->prepare("INSERT INTO notifications (notificationID, notificationFor, notificationFrom, notificationDescription, notificationDate) VALUES (:noteCode, :notificationFor, :notificationFrom, :notificationDescription, :notificationDate)");
			$sendNote->bindParam(':notificationFrom', $noteType);
			$sendNote->bindParam(':notificationDescription', $noteMessage);
			$sendNote->bindParam(':notificationDate', $today);
			$sendNote->bindParam(':notificationFor', $employeeAddress['email']);
			$sendNote->bindParam(':noteCode', $noteID);
			try {
				$sendNote->execute();
			} catch(Exception $error) {
				echo 'Exception -> ';
				var_dump($error->getMessage());
			}
		}
		
		$getCustomers = $dbConnection->prepare('SELECT email FROM customers');
		$getCustomers->execute();
		foreach ($getCustomers as $employeeAddress) {
			$noteID = rand();
			$sendNote = $dbConnection->prepare("INSERT INTO notifications (notificationID, notificationFor, notificationFrom, notificationDescription, notificationDate) VALUES (:noteCode, :notificationFor, :notificationFrom, :notificationDescription, :notificationDate)");
			$sendNote->bindParam(':notificationFrom', $noteType);
			$sendNote->bindParam(':notificationDescription', $noteMessage);
			$sendNote->bindParam(':notificationDate', $today);
			$sendNote->bindParam(':notificationFor', $employeeAddress['email']);
			$sendNote->bindParam(':noteCode', $noteID);
			try {
				$sendNote->execute();
			} catch(Exception $error) {
				echo 'Exception -> ';
				var_dump($error->getMessage());
			}
		}
	}
	if ($receiver == "Drivers") {
		$getEmployees = $dbConnection->prepare('SELECT email FROM employees');
		$getEmployees->execute();
		foreach ($getEmployees as $employeeAddress) {
			$noteID = rand();
			$sendNote = $dbConnection->prepare("INSERT INTO notifications (notificationID, notificationFor, notificationFrom, notificationDescription, notificationDate) VALUES (:noteCode, :notificationFor, :notificationFrom, :notificationDescription, :notificationDate)");
			$sendNote->bindParam(':notificationFrom', $noteType);
			$sendNote->bindParam(':notificationDescription', $noteMessage);
			$sendNote->bindParam(':notificationDate', $today);
			$sendNote->bindParam(':notificationFor', $employeeAddress['email']);
			$sendNote->bindParam(':noteCode', $noteID);
			try {
				$sendNote->execute();
			} catch(Exception $error) {
				echo 'Exception -> ';
				var_dump($error->getMessage());
			}
		}
	}
	if ($receiver == "Customers") {
		$getCustomers = $dbConnection->prepare('SELECT email FROM customers');
		$getCustomers->execute();
		foreach ($getCustomers as $employeeAddress) {
			$noteID = rand();
			$sendNote = $dbConnection->prepare("INSERT INTO notifications (notificationID, notificationFor, notificationFrom, notificationDescription, notificationDate) VALUES (:noteCode, :notificationFor, :notificationFrom, :notificationDescription, :notificationDate)");
			$sendNote->bindParam(':notificationFrom', $noteType);
			$sendNote->bindParam(':notificationDescription', $noteMessage);
			$sendNote->bindParam(':notificationDate', $today);
			$sendNote->bindParam(':notificationFor', $employeeAddress['email']);
			$sendNote->bindParam(':noteCode', $noteID);
			try {
				$sendNote->execute();
			} catch(Exception $error) {
				echo 'Exception -> ';
				var_dump($error->getMessage());
			}
		}
	}
	if ($receiver == "Other") {
		$noteID = rand();
		$sendNote = $dbConnection->prepare("INSERT INTO notifications (notificationID, notificationFor, notificationFrom, notificationDescription, notificationDate) VALUES (:noteCode, :notificationFor, :notificationFrom, :notificationDescription, :notificationDate)");
		$sendNote->bindParam(':notificationFrom', $noteType);
		$sendNote->bindParam(':notificationDescription', $noteMessage);
		$sendNote->bindParam(':notificationDate', $today);
		$sendNote->bindParam(':notificationFor', $address);
		$sendNote->bindParam(':noteCode', $noteID);
		try {
			$sendNote->execute();
		} catch(Exception $error) {
			echo 'Exception -> ';
			var_dump($error->getMessage());
		}
	}
?>

<!doctype html>
<html lang="en">
	<script>
		window.location = '../notificationManager.php'
	</script>
</html>