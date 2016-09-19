<?php
    include("../dbTools/dbConnect.php");
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
    <?php include("includes/employee/sidebar.html"); ?>

    <div class="main-panel">
        <?php include("includes/navbar-mobile-open.html"); ?>
        <a class="navbar-brand" href="#">Assign Drivers</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
                <?php
				$total = $dbConnection->query('SELECT
				COUNT(*)
				FROM deliveries')->fetchColumn();
				
				$limit = 11;
				
				$pages = ceil($total / $limit);
				
				$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array
				('options' => array
					('default' => 1,
					 'min_range' => 1,
					),
				)));
				
				$offset = ($page - 1) * $limit;
				
				$start = $offset + 1;
				$end = min(($offset + $limit), $total);
				
				$prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
				$nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
				echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';
				
				$result = $dbConnection->prepare('SELECT deliveryID, shipmentID, shipmentStatus, deliveryDueBy, deliveryAddress, deliveryAddressPostcode, assignedDriver
				FROM deliveries
				ORDER BY deliveryAddressPostcode
				LIMIT :limit
				OFFSET :offset');
				$result->bindParam(':limit', $limit, PDO::PARAM_INT);
				$result->bindParam(':offset', $offset, PDO::PARAM_INT);
				$result->execute();
					
				?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th><strong>Delivery ID</strong></th>
							<th><strong>Shipment ID</strong></th>
							<th><strong>Shipment Status</strong></th>
							<th><strong>Assign Driver ID</strong></th>
							<th><strong>Delivery Due By</strong></th>
							<th><strong>Delivery Address</strong></th>
							<th><strong>Postcode</strong></th>
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
								if($customer['assignedDriver'] == null){
									?>
									<form action='dashboardTools/assignDriver.php' method='POST' novalidate>
									<input type='hidden' name='packageNum' value='<?php echo $customer["deliveryID"];?>'/> 
									<select name="noDriverAssigned" class='form-control' onChange="javascript: submit()">
										<option selected>No Driver Assigned</option>
										<?php 
										$employeeResults = $dbConnection->prepare('SELECT employeeID FROM employees');
										$employeeResults->execute();
										foreach ($employeeResults as $driver) { ?>
											<option><?php echo $driver['employeeID'] ?></option>
										<?php } ?>
									</select>
									</form>
									<?php
								} else { ?>
									<form action='dashboardTools/assignDriver.php' method='POST' novalidate>
									<input type='hidden' name='packageNum' value='<?php echo $customer["deliveryID"];?>'/> 
									<select name="DriverReplaced" class='form-control' onChange="javascript: submit()">
										<option disabled selected><?php echo $customer['assignedDriver'] ?></option>
										<?php 
										$employeeResults = $dbConnection->prepare('SELECT employeeID FROM employees');
										$employeeResults->execute();
										foreach ($employeeResults as $driver) { ?>
											<option><?php echo $driver['employeeID'] ?></option>
										<?php } ?>
									</select>
									</form>
									<?php 
								}
								echo '</td>';
								echo '<td>';
									echo $customer['deliveryDueBy'];
								echo '</td>';
								echo '<td>';
									echo $customer['deliveryAddress'];
								echo '</td>';
								echo '<td>';
									echo $customer['deliveryAddressPostcode'];
								echo '</td>';
							echo '</tr>';
						}
					echo '</tbody>
					</table>';
				?>
            </div>
			<button type="button" onclick="submitChanges()" class='btn btn-info btn-fill col-md-12 white-custom-button'>Confirm Assignments</button>
				<script>
					function submitChanges() {
						window.location = 'deliveries.php'
					}
				</script>
			<br>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>
