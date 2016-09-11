<?php
    include("../dbTools/dbConnect.php");
    //include("dashboardTools/checkAndValidateLogin.php");
    //include("bookPackageTools/inputSenderData.php");

    session_start();
    //Set variables
    //include ("dashboardTools/bookPackageTools/assignBookingVariables.php");


?>

<!doctype html>
<html lang="en">
	<head>
		<title>Consignment Note</title>

	    <?php include("includes/styling_scripts/meta.html"); ?>
	    <link rel="stylesheet" type="text/css" href="dashboardTools/consignmentNoteTools/consignmentnotecss.css">


	</head>
	<body>

		<div class="wrapper">
			<h1>ON THE SPOT COURIERS</h1>
			<table>
				<tr>
					<th>
					
					</th>
				</tr>
			</table>
			<div class="senderSection">
				<h3>From:</h3>
				
			</div>
			<div class="receiverSection">
				<h3>Ship To:<h3>
				
			</div>
			<table>
				<tr>
					<th>Reference No.</th>
					<th>No. of Items</th>
					<th>Description of Goods</th>
					<th>Weight(kg)</th>
					<th>Length</th>
					<th>Width</th>
					<th>Depth</th>
				</tr>
				<tr>
					
				</tr>
			</table>

		</div  >



	</body>
</html>
