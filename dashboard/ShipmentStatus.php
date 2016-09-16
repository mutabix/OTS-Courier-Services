<?php
    include("../dbTools/dbConnect.php");
    
     session_start();
  
?>
<?php
function updater($value,$id) {
    
   $sql = "UPDATE table_name SET name = ? WHERE id= ?";
   $update = $conn->prepare($sql);
   $update->bind_param(':Shipment Status', $shipmentId);
   $update->bind_param(':Payment Status' $paymentStatus); //Getting a Error message 
   $update->bind_param(':Date' $date); 
   $update->execute();
   if ($update->affected_rows > 0) {
       echo "Record updated successfully";
   } else {
       echo "Error updating record: " . $conn->error;
       ?>

<!doctype html>
<html lang="en">
<head>
	<title>Status</title>

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
        <a class="navbar-brand" href="#">Dashboard</a>
        <?php include("includes/navbar-mobile-close.html"); ?>


        <div class="content">
            <div class="container-fluid">
                <?php
				$result = $dbConnection->prepare('SELECT shipmentId, costumerId, firstName, lastName, paymentStatus, trackingId, driverId, Date 
				FROM payment, booking');
				$result->execute();
				
				echo '<table class="table">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Shipment</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>';
						foreach ($result as $payment, $booking)
						{
							echo '<tr>';
								echo '<td>';
									echo "<a href='contacts=".$booking["customerId"]."'>".$booking["firstName"]."</a>";
								echo '</td>';
								echo '<td>';
									echo $booking['lastName'];
								echo '</td>';
								echo '<td>';
									echo $payments['ShipmentId'];
								echo '</td>';
								echo '<td>';
									echo $payment['paymentStatus'].;"'>".payment["trackingId"].;"'>".payment["driverId"].;"'>".payment["date"];
								echo '</td>';
								echo '<td>';
							echo '</tr>';
						}
					echo '</tbody>
					</table>';
				?>


<div class="row">
                <button type="button" class="btn btn-info btn-fill pull-left" name="shipmentStatus" style="margin-right: 20px;">Update</button>
            </div>
            <br /><br />
            <div class="row">
                <button type="button" class="btn btn-info btn-fill pull-left" name="toDashboard" href="dashboard.php">Return to Dashboard</button>
            </div>

            </div>
        </div>


        <?php include("includes/footer.html"); ?>

    </div>
</div>
</body>


</html>