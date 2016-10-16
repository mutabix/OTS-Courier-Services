<?php
	session_start();
	include("../../dbTools/dbConnect.php");
	
	$getEmployees = $dbConnection->prepare('SELECT employeeID FROM employees WHERE email = :email');
	$getEmployees->bindParam(':email', $_SESSION['username']);
	$getEmployees->execute();
?>

<!doctype html>
<html lang="en">
<head>
	<title>Employee Dashboard</title>

    <?php include("includes/styling_scripts/meta.html"); ?>
    <?php include("includes/styling_scripts/css.html"); ?>
    <?php include("includes/styling_scripts/fonts-icons.html"); ?>
    <?php include("includes/styling_scripts/javascript.html"); ?>
</head>
<body>

<div class="wrapper">
    <?php include("includes/sidebar.html"); ?>

    <div class="main-panel">
        <?php include("includes/navbar-mobile-open.html"); ?>
        <a class="navbar-brand" href="#">Daily Timetable</a>
        <?php include("includes/navbar-mobile-close.html"); ?>

		<?php
		$searchBy = "Assigned to Driver " + $getEmployees;
		$searchByPlus = "Assigned to Driver ".$searchBy."";
		$selectedDay = date("Y-m-d");
		
		$result = $dbConnection->prepare('SELECT deliveryID, shipmentID, shipmentStatus, deliveryDueBy, deliveryAddress, deliveryAddressPostcode, priority
		FROM deliveries
		WHERE shipmentStatus = :idCode
		ORDER BY deliveryAddressPostcode');
		$result->bindParam(':idCode', $searchByPlus);
		$result->execute();
		?>

        <div class="content">
            <div class="container-fluid">
                <?php
				$today = date("Y-m-d");
				?>
				<select id = "dateSelect" name="selectDate" class='form-control' onChange="changePage(this.value)">
					<option selected><?php echo $today ?></option>
					<?php 
						$time = date("d-m-Y");
						for ($x = 1; $x <= 30; $x++) {
							$time = date('Y-m-d', strtotime($today . '+ '.$x.'days'));
							?><option><?php echo $time?></option><?php
						} ?>
				</select>
				<table class="table table-hover">
					<thead>
						<tr>
							<th><strong>Delivery ID</strong></th>
							<th><strong>Shipment ID</strong></th>
							<th><strong>Shipment Status</strong></th>
							<th><strong>Delivery Address</strong></th>
							<th><strong>Postcode</strong></th>
							<th><strong>Priority</strong></th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach ($result as $customer)
						{
							?>
							<tr onclick="location.href=<?php echo"assignment";?>;" style="cursor: pointer">
							<?php
								echo '<td>';
									echo $customer["deliveryID"];
								echo '</td>';
								echo '<td>';
									echo $customer['shipmentID'];
								echo '</td>';
								echo '<td>';
									echo $customer['shipmentStatus'];
								echo '</td>';
								echo '<td>';
									echo $customer['deliveryAddress'];
								echo '</td>';
								echo '<td>';
									echo $customer['deliveryAddressPostcode'];
								echo '</td>';
								echo '<td>';
									echo $customer['priority'];
								echo '</td>';
							echo '</tr>';
						}
					echo '</tbody>
					</table>';
				?>
            </div>
        </div>

		<script>
			function changePage(id) {
				<?php 
					$selectedDay = id;
				?>
			}
		</script>
        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
